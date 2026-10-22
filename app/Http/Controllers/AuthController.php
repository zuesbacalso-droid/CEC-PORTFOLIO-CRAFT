<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\RateLimiter;
use Throwable;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth');
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'username' => ['required', 'string'],
            'password' => ['required', 'string'],
            'remember' => ['nullable', 'boolean'],
        ]);

        $user = User::where('username', $data['username'])->first();

        if (!$user || !Hash::check($data['password'], $user->password)) {
            return back()->withErrors(['username' => 'Invalid username or password.'])->onlyInput('username');
        }

        if (!$user->email_verified_at) {
            return back()->withErrors(['username' => 'Please verify your Gmail address first. Check the verification email sent when you created your account.'])->onlyInput('username');
        }

        Auth::login($user, $request->boolean('remember'));
        $request->session()->regenerate();

        return redirect()->intended('/');
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255', 'regex:/^[\pL\pM][\pL\pM\s\'.\-]*$/u'],
            'username' => ['required', 'alpha_dash', 'min:3', 'max:40', 'unique:users,username'],
            'email' => ['required', 'email:rfc', 'max:255', 'regex:/^[^@\s]+@gmail\.com$/i', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ], [
            'name.regex' => 'Enter your full name using letters, spaces, apostrophes, periods, or hyphens only.',
            'email.regex' => 'Please use a working Gmail address ending in @gmail.com.',
        ]);

        if (!$this->smtpIsConfigured()) {
            return back()->withErrors(['email' => 'Gmail verification is not configured yet. Set MAIL_MAILER=smtp and your Gmail App Password in .env, then run php artisan config:clear.'])->withInput($request->except(['password', 'password_confirmation']));
        }

        $key = 'register-code:' . sha1(strtolower($data['email'])) . ':' . $request->ip();
        if (RateLimiter::tooManyAttempts($key, 3)) {
            return back()->withErrors(['email' => 'Too many verification requests. Please try again in a few minutes.'])->withInput($request->except(['password', 'password_confirmation']));
        }
        RateLimiter::hit($key, 300);

        $code = (string) random_int(100000, 999999);
        $user = User::create([
            'name' => trim($data['name']),
            'username' => $data['username'],
            'email' => strtolower($data['email']),
            'password' => Hash::make($data['password']),
        ]);

        cache()->put('cec-registration-code:' . $user->id, Hash::make($code), now()->addMinutes(10));

        try {
            Mail::raw(
                "Welcome to CEC Portfolio Craft!\n\nYour email verification code is: {$code}\n\nThis code expires in 10 minutes. If you did not create this account, you can ignore this email.",
                function ($message) use ($user) {
                    $message->to($user->email, $user->name)->subject('Verify your CEC Portfolio Craft account');
                }
            );
        } catch (Throwable $exception) {
            report($exception);
            cache()->forget('cec-registration-code:' . $user->id);
            $user->delete();
            return back()->withErrors(['email' => 'We could not send the verification email. Check your Gmail SMTP settings in .env, then try again.'])->withInput($request->except(['password', 'password_confirmation']));
        }

        return redirect()->route('login')
            ->with('registration_code_sent', true)
            ->with('verification_email', $user->email)
            ->with('status', 'A 6-digit verification code was sent to your Gmail. It expires in 10 minutes.');
    }

    public function verifyRegistration(Request $request)
    {
        $data = $request->validate([
            'email' => ['required', 'email'],
            'code' => ['required', 'digits:6'],
        ]);

        $key = 'verify-registration:' . sha1(strtolower($data['email'])) . ':' . $request->ip();
        if (RateLimiter::tooManyAttempts($key, 5)) {
            return back()->withErrors(['code' => 'Too many incorrect attempts. Please request a new verification code.'])
                ->with('registration_code_sent', true)->with('verification_email', $data['email']);
        }

        $user = User::where('email', strtolower($data['email']))->first();
        if (!$user) {
            RateLimiter::hit($key, 600);
            return back()->withErrors(['code' => 'The account or verification code is invalid.'])
                ->with('registration_code_sent', true)->with('verification_email', $data['email']);
        }

        if ($user->email_verified_at) {
            return redirect()->route('login')->with('status', 'Your Gmail is already verified. Sign in with your username and password.');
        }

        $hash = cache()->get('cec-registration-code:' . $user->id);
        if (!$hash || !Hash::check($data['code'], $hash)) {
            RateLimiter::hit($key, 600);
            return back()->withErrors(['code' => 'The verification code is invalid or expired.'])
                ->with('registration_code_sent', true)->with('verification_email', $data['email']);
        }

        $user->forceFill(['email_verified_at' => now()])->save();
        cache()->forget('cec-registration-code:' . $user->id);
        RateLimiter::clear($key);
        RateLimiter::clear('register-code:' . sha1(strtolower($user->email)) . ':' . $request->ip());

        return redirect()->route('login')->with('status', 'Gmail verified successfully! You can now sign in using your username and password.');
    }

    public function resendRegistrationCode(Request $request)
    {
        $data = $request->validate(['email' => ['required', 'email']]);
        $email = strtolower($data['email']);
        $user = User::where('email', $email)->first();
        if (!$user || $user->email_verified_at) {
            return redirect()->route('login')->with('status', 'If the account needs verification, a new code has been sent.');
        }

        if (!$this->smtpIsConfigured()) {
            return back()->withErrors(['email' => 'Gmail verification is not configured yet. Set MAIL_MAILER=smtp and your Gmail App Password in .env, then run php artisan config:clear.'])
                ->with('registration_code_sent', true)->with('verification_email', $email);
        }

        $key = 'register-code:' . sha1($email) . ':' . $request->ip();
        if (RateLimiter::tooManyAttempts($key, 3)) {
            return back()->withErrors(['email' => 'Too many verification requests. Please try again later.'])
                ->with('registration_code_sent', true)->with('verification_email', $email);
        }
        RateLimiter::hit($key, 300);

        $code = (string) random_int(100000, 999999);
        cache()->put('cec-registration-code:' . $user->id, Hash::make($code), now()->addMinutes(10));
        try {
            Mail::raw("Your CEC Portfolio Craft email verification code is: {$code}\n\nThis code expires in 10 minutes.", function ($message) use ($user) {
                $message->to($user->email, $user->name)->subject('Your CEC Portfolio Craft verification code');
            });
        } catch (Throwable $exception) {
            report($exception);
            return back()->withErrors(['email' => 'Email delivery failed. Check your Gmail SMTP settings.'])
                ->with('registration_code_sent', true)->with('verification_email', $email);
        }

        return redirect()->route('login')->with('registration_code_sent', true)
            ->with('verification_email', $email)->with('status', 'A new verification code has been sent.');
    }

    private function smtpIsConfigured(): bool
    {
        $username = (string) config('mail.mailers.smtp.username', '');
        $password = (string) config('mail.mailers.smtp.password', '');

        return config('mail.default') === 'smtp'
            && config('mail.mailers.smtp.host') === 'smtp.gmail.com'
            && $username !== ''
            && !str_contains($username, 'your-gmail')
            && $password !== ''
            && !str_contains($password, 'your-google-app-password');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
