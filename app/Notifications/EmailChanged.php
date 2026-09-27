<?php

namespace App\Notifications;

use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class EmailChanged extends Notification
{
    public function __construct(private string $newEmail)
    {
    }

    public function via($notifiable): array
    {
        return ['mail'];
    }

    public function toMail($notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Your email address was changed')
            ->line("The email address on your My Daily Dozen account was changed to {$this->newEmail}.")
            ->line("If you didn't make this change, get in touch with us.")
            ->action('Get in touch', url('/contact'));
    }
}
