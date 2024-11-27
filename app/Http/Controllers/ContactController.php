<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Validator;

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
        Contact::create([
            'email' => $request->email,
            'topic' => $request->topic,
            'message' => $request->message,
        ]);

        return redirect()->back()->with('success', 'Wiadomość została wysłana!');
    }
}
