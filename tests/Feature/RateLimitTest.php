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
