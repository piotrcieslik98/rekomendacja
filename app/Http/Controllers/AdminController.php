<?php

namespace App\Http\Controllers;


use App\Models\Contact;
use App\Models\Country;
use App\Models\Result;
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
    public function results()
    {
        $results = Result::paginate(10); // Pobiera dane z tabeli i dzieli na strony
        return view('admin.results', compact('results'));
    }

    public function deleteResult($id)
    {
        Result::findOrFail($id)->delete();
        return redirect()->route('admin.results')->with('success', 'Rekord został usunięty.');
    }

    public function countries()
    {
        $countries = Country::all(); // Paginacja dla tabeli krajów
        return view('admin.country', compact('countries'));
    }

    public function createCountry()
    {
        return view('admin.create'); // Ładuje widok 'admin/create.blade.php'
    }


    public function storeCountry(Request $request)
    {
        $request->validate([
            'country_name' => 'required|string|max:255',
            'weather' => 'required|string|max:255',
            'tourist_attractions' => 'required|string',
            'recommended_activities' => 'required|string',
            'prices' => 'required|string',
        ]);

        Country::create($request->all());

        return redirect()->route('admin.countries')->with('success', 'Nowy kraj został dodany.');
    }


    public function editCountry($id)
    {
        $country = Country::findOrFail($id); // Znalezienie kraju po ID
        return view('admin.edit', compact('country')); // Zwrócenie widoku 'admin/edit'
    }

    public function updateCountry(Request $request, $id)
    {
        $request->validate([
            'country_name' => 'required|string|max:255',
            'weather' => 'required|string|max:255',
            'tourist_attractions' => 'required|string',
            'recommended_activities' => 'required|string',
            'prices' => 'required|string',
        ]);

        $country = Country::findOrFail($id); // Znalezienie kraju po ID
        $country->update($request->all());
        return redirect()->route('admin.countries')->with('success', 'Kraj został zaktualizowany.');
    }

    public function deleteCountry($id)
    {
        Country::findOrFail($id)->delete(); // Usunięcie kraju po ID
        return redirect()->route('admin.countries')->with('success', 'Kraj został usunięty.');
    }


}
