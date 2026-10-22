<?php

namespace Tests\Unit;

use App\Services\GmailVerificationMailer;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class GmailVerificationMailerTest extends TestCase
{
    public function test_it_posts_the_verification_message_to_the_configured_relay(): void
    {
        config()->set('services.gmail', [
            'relay_url' => 'https://script.google.com/macros/s/test-id/exec',
            'relay_token' => 'test-relay-token',
        ]);

        Http::fake([
            'https://script.google.com/macros/s/test-id/exec' => Http::response(['ok' => true]),
        ]);

        app(GmailVerificationMailer::class)->send(
            'recipient@gmail.com',
            'Verify your account',
            'Your code is 123456.',
        );

        Http::assertSent(fn (Request $request) => $request->url() === 'https://script.google.com/macros/s/test-id/exec'
            && $request['token'] === 'test-relay-token'
            && $request['to'] === 'recipient@gmail.com'
            && $request['subject'] === 'Verify your account'
            && $request['body'] === 'Your code is 123456.');
    }

    public function test_it_reports_missing_relay_settings_as_unconfigured(): void
    {
        config()->set('services.gmail', [
            'relay_url' => '',
            'relay_token' => '',
        ]);

        $this->assertFalse(app(GmailVerificationMailer::class)->isConfigured());
    }
}