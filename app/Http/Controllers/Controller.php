<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Country;
use App\Models\Result;
use Illuminate\Support\Facades\Mail;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function showRecommendationForm()
    {
        // Pobierz opcje temperatury z bazy danych
        $temperatureOptions = Country::select('weather')->distinct()->pluck('weather');

        // Pobierz opcje zalecanych aktywności turystycznych z bazy danych
        $activities = Country::distinct()->pluck('recommended_activities');

        // Przekazanie temperatury i zalecanych aktywności turystycznych do widoku
        return view('recomend', ['temperatureOptions' => $temperatureOptions, 'activities' => $activities]);
    }





    public function recommendCountry(Request $request)
    {
        $request->validate([
            'climate' => 'required|string',
            'recommended_activities' => 'required|string',
            'budget' => 'required|string',
            'email' => 'required|email',
        ]);

        // Pobierz dane z formularza
        $weather = $request->input('climate');
        $attractions = $request->input('recommended_activities');
        $prices = $request->input('budget');
        $email = $request->input('email');

        // Przypisz wagi do kryteriów
        $weatherWeight = 0.4;
        $attractionsWeight = 0.3;
        $pricesWeight = 0.3;

        // Pobierz wszystkie kraje z bazy danych
        $countries = Country::all();
        $recommendedCountry = null;
        $maxScore = -1;

        // Oblicz sumaryczną ocenę dla każdego kraju
        foreach ($countries as $country) {
            $score = $this->calculateCountryScore($country, $weather, $attractions, $prices, $weatherWeight, $attractionsWeight, $pricesWeight);
            if ($score > $maxScore) {
                $maxScore = $score;
                $recommendedCountry = $country;
            }
        }

        // Zapisz wynik w tabeli `results`
        if ($recommendedCountry) {
            Result::create([
                'user_id' => auth()->id() ?? null,
                'recommended_country' => $recommendedCountry->country_name,
                'weather' => $weather,
                'recommended_activities' => $attractions,
                'budget' => $prices,
            ]);

            // Wyślij e-mail
            Mail::send('emails.recommendation', [
                'recommendedCountry' => $recommendedCountry->country_name,
                'weather' => $weather,
                'attractions' => $attractions,
                'prices' => $prices,
            ], function ($message) use ($email) {
                $message->to($email)
                    ->subject('Twoja rekomendacja podróży');
            });
        } else {
            return back()->with('error', 'No country matches the selected criteria.');
        }

        // Pobierz opcje temperatury i aktywności
        $temperatureOptions = Country::select('weather')->distinct()->pluck('weather');
        $activities = Country::distinct()->pluck('recommended_activities');

        return view('recomend', [
            'recommendedCountry' => $recommendedCountry,
            'temperatureOptions' => $temperatureOptions,
            'activities' => $activities,
        ]);
    }



    private function calculateCountryScore($country, $weather, $attractions, $prices, $weatherWeight, $attractionsWeight, $pricesWeight)
    {
        // Oblicz sumaryczną ocenę na podstawie preferencji użytkownika i wag kryteriów
        $score = ($country->weather == $weather ? 1 : 0) * $weatherWeight +
            (stripos($country->recommended_activities, $attractions) !== false ? 1 : 0) * $attractionsWeight +
            ($country->prices == $prices ? 1 : 0) * $pricesWeight;

        return $score;
    }

}
