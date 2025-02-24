<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormEmail;
use App\Models\ContactTicket;
use Illuminate\Http\Request;
use Illuminate\Mail\Message;
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

        $ticket = ContactTicket::create([
            'first_name' => $firstName,
            'last_name' => $lastName,
            'email' => $email,
            'message' => $body,
        ]);

        Mail::to(env('MAIL_RECIPIENT'))->send(new ContactFormEmail($ticket));

        return back()->with('success', true);
    }
}
