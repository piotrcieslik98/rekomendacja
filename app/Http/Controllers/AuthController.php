<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    /**
     * Wyświetlenie formularza rejestracji.
     */
    public function showRegistrationForm()
    {
        return view('registration');
    }

    /**
     * Obsługa rejestracji użytkownika.
     */
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        User::create([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login')->with('success', 'Rejestracja zakończona sukcesem! Możesz się teraz zalogować.');
    }

    /**
     * Wyświetlenie formularza logowania.
     */
    public function showLoginForm()
    {
        return view('login');
    }

    /**
     * Obsługa logowania użytkownika.
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect()->route('recommendation.form')->with('success', 'Zalogowano pomyślnie.');
        }

        return back()->withErrors([
            'email' => 'Nieprawidłowy email lub hasło.',
        ]);
    }

    /**
     * Obsługa wylogowania użytkownika.
     */
    public function logout()
    {
        Auth::logout();
        return redirect()->route('recommendation.form')->with('success', 'Wylogowano pomyślnie.');
    }
}
