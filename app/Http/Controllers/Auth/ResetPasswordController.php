<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

class ResetPasswordController extends Controller
{
    /**
     * Wyświetlenie formularza resetowania hasła.
     */
    public function showResetForm($token)
    {
        return view('auth.passwords.reset', ['token' => $token]);
    }

    /**
     * Obsługa zapisu nowego hasła.
     */
    public function reset(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:8|confirmed',
            'token' => 'required',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password),
                ])->save();
            }
        );

        if ($status === Password::PASSWORD_RESET) {
            return redirect()->route('login')->with('status', 'Twoje hasło zostało zresetowane!');
        }

        return back()->withErrors(['email' => 'Nie możemy znaleźć użytkownika z podanym adresem e-mail.']);
    }

}
