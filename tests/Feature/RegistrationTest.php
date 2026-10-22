<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_registration_does_not_require_a_full_name(): void
    {
        config()->set('services.gmail', [
            'relay_url' => 'https://script.google.com/macros/s/test-id/exec',
            'relay_token' => 'test-relay-token',
        ]);

        Http::fake([
            'https://script.google.com/macros/s/test-id/exec' => Http::response(['ok' => true]),
        ]);

        $response = $this->post('/register', [
            'username' => 'portfolio-user',
            'email' => 'portfolio-user@gmail.com',
            'password' => 'correct-horse-battery',
            'password_confirmation' => 'correct-horse-battery',
        ]);

        $response->assertRedirect(route('login'));
        $this->assertDatabaseHas('users', [
            'username' => 'portfolio-user',
            'name' => 'portfolio-user',
            'email' => 'portfolio-user@gmail.com',
        ]);
    }
}