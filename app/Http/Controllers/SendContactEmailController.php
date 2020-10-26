<?php

namespace App\Http\Controllers;

use App\Models\ContactTicket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SendContactEmailController extends Controller
{
    public function __invoke(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        $firstName = $request->input('first_name');
        $lastName = $request->input('last_name');
        $email = $request->input('email');
        $body = $request->input('message');

        ContactTicket::create([
            'first_name' => $firstName,
            'last_name' => $lastName,
            'email' => $email,
            'message' => $body,
        ]);

        $subject = $firstName . " " . $lastName . " contacted My Daily Dozen";

        Mail::send(
            'contact',
            ['subject' => $subject, 'body' => $body],
            function ($message) use ($email, $subject) {
                $message->from($email);
                $message->to(env('MAIL_RECIPIENT'));
                $message->subject($subject);
            }
        );

        return back()->with('success', true);
    }
}
