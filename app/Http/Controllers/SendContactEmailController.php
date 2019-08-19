<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class SendContactEmailController extends Controller
{
    public function __invoke(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ]);

        $email = $request->input('email');
        $subject = $request->input('subject');
        $body = $request->input('message');

        Mail::send(
            'contact.email',
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
