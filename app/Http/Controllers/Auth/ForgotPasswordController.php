<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
    /**
     * Wyświetlenie formularza do żądania resetu hasła.
     */
    public function showLinkRequestForm()
    {
        return view('auth.passwords.email');
    }

    /**
     * Obsługa żądania wysłania e-maila z linkiem resetującym hasło.
     */
    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink($request->only('email'));

        if ($status === Password::RESET_LINK_SENT) {
            return back()->with('status', 'Wysłaliśmy e-mail z linkiem do resetowania hasła!');
        }

        return back()->withErrors(['email' => 'Nie możemy znaleźć użytkownika z podanym adresem e-mail.']);
    }

}
