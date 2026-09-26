<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RateLimitTest extends TestCase
{
    use RefreshDatabase;

    public function test_logins_are_throttled(): void
    {
        $this->makeUser();

        for ($i = 0; $i < 5; $i++) {
            $this->post('/login', ['email' => 'test@example.com', 'password' => 'wrong'])->assertRedirect();
        }

        $this->post('/login', ['email' => 'test@example.com', 'password' => 'wrong'])->assertTooManyRequests();
    }

    public function test_sign_ups_are_throttled(): void
    {
        $signUp = fn (int $i) => ['name' => 'Bot', 'email' => "bot$i@example.com", 'password' => 'short', 'password_confirmation' => 'short'];

        for ($i = 0; $i < 6; $i++) {
            $this->post('/register', $signUp($i))->assertRedirect();
        }

        $this->post('/register', $signUp(6))->assertTooManyRequests();
    }

    public function test_someone_can_still_sign_up(): void
    {
        $this->post('/register', [
            'name' => 'Ada',
            'email' => 'ada@example.com',
            'password' => 'a-long-enough-password',
            'password_confirmation' => 'a-long-enough-password',
        ])->assertRedirect();

        $this->assertAuthenticated();
        $this->assertDatabaseHas('users', ['email' => 'ada@example.com']);
    }

    public function test_the_contact_form_is_throttled(): void
    {
        config(['mail.recipient' => 'hello@example.com']);
        $message = fn (int $i) => [
            'first_name' => 'Ada',
            'last_name' => 'Lovelace',
            'email' => "ada$i@example.com",
            'message' => 'Hello',
        ];

        for ($i = 0; $i < 3; $i++) {
            $this->post('/contact/send', $message($i))->assertRedirect();
        }

        $this->post('/contact/send', $message(3))->assertTooManyRequests();
        $this->assertDatabaseCount('contact_tickets', 3);
    }
}
