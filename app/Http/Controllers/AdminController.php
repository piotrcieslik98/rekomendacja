<?php

namespace App\Http\Controllers;


use App\Models\Contact;
use Hash;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{


    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials, $request->filled('remember'))) {
            $user = Auth::user();
            if ($user->is_admin) {
                return redirect()->intended('admin/dashboard');
            } else {
                Auth::logout();
                return redirect()->route('admin.login')->withErrors([
                    'email' => 'Nie masz uprawnień, aby uzyskać dostęp do tej strony.',
                ]);
            }
        }

        return redirect()->route('admin.login')->withErrors([
            'email' => 'Niepoprawny login lub hasło',
        ]);
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin');
    }
    public function showContacts()
    {
        $contacts = Contact::paginate(10); // Pobieranie danych
        return view('admin.contact', compact('contacts'));
    }
    public function contact()
    {
        $contacts = Contact::with('manage')->paginate(10); // Pobieramy dane z relacją
        return view('admin.contact', compact('contacts'));
    }

    /**
     * Usuwanie wybranego kontaktu.
     */
    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return redirect()->route('admin.contact')->with('success', 'Kontakt został pomyślnie usunięty.');
    }

}
