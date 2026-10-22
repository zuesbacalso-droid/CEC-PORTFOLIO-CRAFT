<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\GmailVerificationMailer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;
use Throwable;

class AuthController extends Controller
{
    public function __construct(private readonly GmailVerificationMailer $gmailMailer)
    {
    }

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
            'username' => ['required', 'alpha_dash', 'min:3', 'max:40', 'unique:users,username'],
            'email' => ['required', 'email:rfc', 'max:255', 'regex:/^[^@\s]+@gmail\.com$/i', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ], [
            'email.regex' => 'Please use a working Gmail address ending in @gmail.com.',
        ]);

        if (!$this->gmailMailer->isConfigured()) {
            return back()->withErrors(['email' => 'Gmail verification is not configured yet. Set GMAIL_RELAY_URL and GMAIL_RELAY_TOKEN in Render environment settings.'])->withInput($request->except(['password', 'password_confirmation']));
        }

        $key = 'register-code:' . sha1(strtolower($data['email'])) . ':' . $request->ip();
        if (RateLimiter::tooManyAttempts($key, 3)) {
            return back()->withErrors(['email' => 'Too many verification requests. Please try again in a few minutes.'])->withInput($request->except(['password', 'password_confirmation']));
        }
        RateLimiter::hit($key, 300);

        $code = (string) random_int(100000, 999999);
        $user = User::create([
            'name' => $data['username'],
            'username' => $data['username'],
            'email' => strtolower($data['email']),
            'password' => Hash::make($data['password']),
        ]);

        cache()->put('cec-registration-code:' . $user->id, Hash::make($code), now()->addMinutes(10));

        try {
            $this->gmailMailer->send(
                $user->email,
                'Verify your CEC Portfolio Craft account',
                "Welcome to CEC Portfolio Craft!\n\nYour email verification code is: {$code}\n\nThis code expires in 10 minutes. If you did not create this account, you can ignore this email.",
            );
        } catch (Throwable $exception) {
            report($exception);
            cache()->forget('cec-registration-code:' . $user->id);
            $user->delete();
            return back()->withErrors(['email' => 'We could not send the verification email. Check the Gmail relay settings, then try again.'])->withInput($request->except(['password', 'password_confirmation']));
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

        if (!$this->gmailMailer->isConfigured()) {
            return back()->withErrors(['email' => 'Gmail verification is not configured yet. Set GMAIL_RELAY_URL and GMAIL_RELAY_TOKEN in Render environment settings.'])
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
            $this->gmailMailer->send(
                $user->email,
                'Your CEC Portfolio Craft verification code',
                "Your CEC Portfolio Craft email verification code is: {$code}\n\nThis code expires in 10 minutes.",
            );
        } catch (Throwable $exception) {
            report($exception);
            return back()->withErrors(['email' => 'Email delivery failed. Check the Gmail relay settings.'])
                ->with('registration_code_sent', true)->with('verification_email', $email);
        }

        return redirect()->route('login')->with('registration_code_sent', true)
            ->with('verification_email', $email)->with('status', 'A new verification code has been sent.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
