<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormEmail;
use App\Models\ContactTicket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SendContactEmailController extends Controller
{
    public function __invoke(Request $request)
    {
        if ($request->input('a_password') !== null) {
            // bot detected
            return back()->with('success', true);
        }

        $validated = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        $firstName = $validated['first_name'];
        $lastName = $validated['last_name'];
        $email = $validated['email'];
        $body = $validated['message'];

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
