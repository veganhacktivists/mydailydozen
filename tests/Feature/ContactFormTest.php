<?php

namespace Tests\Feature;

use App\Mail\ContactFormEmail;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class ContactFormTest extends TestCase
{
    use RefreshDatabase;

    private function message(array $overrides = []): array
    {
        return [
            'first_name' => 'Ada',
            'last_name' => 'Lovelace',
            'email' => 'ada@example.com',
            'message' => 'Hello',
            ...$overrides,
        ];
    }

    public function test_a_message_is_saved_and_emailed(): void
    {
        Mail::fake();
        config(['mail.recipient' => 'hello@example.com']);

        $this->post('/contact/send', $this->message())->assertRedirect()->assertSessionHas('success');

        $this->assertDatabaseHas('contact_tickets', ['email' => 'ada@example.com', 'message' => 'Hello']);
        Mail::assertSent(ContactFormEmail::class, fn ($mail) => $mail->hasTo('hello@example.com'));
    }

    public function test_sending_the_same_message_twice_at_once_keeps_one(): void
    {
        Mail::fake();
        config(['mail.recipient' => 'hello@example.com']);
        $this->freezeSecond();

        $this->post('/contact/send', $this->message())->assertRedirect()->assertSessionHas('success');
        $this->post('/contact/send', $this->message())->assertRedirect()->assertSessionHas('success');

        $this->assertDatabaseCount('contact_tickets', 1);
    }

    public function test_distinct_messages_from_one_address_in_the_same_second_are_sent(): void
    {
        Mail::fake();
        config(['mail.recipient' => 'hello@example.com']);
        $this->freezeSecond();

        $this->post('/contact/send', $this->message())->assertRedirect()->assertSessionHas('success');
        $this->post('/contact/send', $this->message(['message' => 'Correction']))->assertRedirect()->assertSessionHas('success');

        $this->assertDatabaseCount('contact_tickets', 2);
        Mail::assertSent(ContactFormEmail::class, fn ($mail) => $mail->ticket->message === 'Correction');
    }

    public function test_a_message_too_long_to_store_is_sent_back(): void
    {
        Mail::fake();

        $this->post('/contact/send', $this->message(['message' => str_repeat('a', 501)]))
            ->assertRedirect()
            ->assertSessionHasErrors('message');

        $this->assertDatabaseCount('contact_tickets', 0);
        Mail::assertNothingSent();
    }
}
