<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormEmail;
use App\Models\ContactTicket;
use Illuminate\Database\UniqueConstraintViolationException;
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
            'first_name' => ['required', 'max:255', 'not_regex:/[\r\n]/'],
            'last_name' => ['required', 'max:255', 'not_regex:/[\r\n]/'],
            'email' => 'required|email|max:255',
            'message' => 'required|max:500',
        ]);

        $firstName = $validated['first_name'];
        $lastName = $validated['last_name'];
        $email = $validated['email'];
        $body = $validated['message'];

        try {
            $ticket = ContactTicket::create([
                'first_name' => $firstName,
                'last_name' => $lastName,
                'email' => $email,
                'message' => $body,
                'content_hash' => hash('sha256', serialize([$firstName, $lastName, $body])),
            ]);
        } catch (UniqueConstraintViolationException) {
            // A repeat of a message saved this second, such as a double click
            return back()->with('success', true);
        }

        dispatch(fn () => Mail::to(config('mail.recipient'))->send(new ContactFormEmail($ticket)))->afterResponse();

        return back()->with('success', true);
    }
}
