<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function showForm()
    {
        return view('contact');
    }

    public function send(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'topic' => 'required|string|max:255',
            'message' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Zapis danych do bazy
        $contact = Contact::create([
            'email' => $request->email,
            'topic' => $request->topic,
            'message' => $request->message,
        ]);

        // Wysyłanie e-maila do nadawcy
        Mail::send('emails.confirmation', [
            'email' => $contact->email,
            'topic' => $contact->topic,
            'messageContent' => $contact->message,
        ], function ($message) use ($contact) {
            $message->to($contact->email) // Adres odbiorcy (nadawca)
            ->subject('Potwierdzenie wysłania wiadomości - ' . $contact->topic);
        });

        return redirect()->back()->with('success', 'Wiadomość została wysłana! Potwierdzenie zostało wysłane na Twój e-mail.');
    }
}
