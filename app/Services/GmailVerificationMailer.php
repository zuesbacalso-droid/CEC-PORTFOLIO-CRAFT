<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use RuntimeException;

class GmailVerificationMailer
{
    public function isConfigured(): bool
    {
        return collect([
            config('services.gmail.relay_url'),
            config('services.gmail.relay_token'),
        ])->every(fn ($value) => is_string($value) && trim($value) !== '');
    }

    public function send(string $recipient, string $subject, string $body): void
    {
        if (!$this->isConfigured()) {
            throw new RuntimeException('Gmail relay settings are incomplete.');
        }

        $response = Http::timeout(15)
            ->acceptJson()
            ->post(config('services.gmail.relay_url'), [
                'token' => config('services.gmail.relay_token'),
                'to' => $recipient,
                'subject' => $subject,
                'body' => $body,
            ])
            ->throw();

        if ($response->json('ok') !== true) {
            throw new RuntimeException('Gmail relay did not confirm email delivery.');
        }
    }
}