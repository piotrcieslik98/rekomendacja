<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Country;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function showRecommendationForm()
    {
        // Pobierz unikalne opcje temperatury z bazy danych
        $temperatureOptions = Country::select('weather')->distinct()->pluck('weather');

        // Pobierz unikalne opcje zalecanych aktywności turystycznych z bazy danych
        $activities = Country::distinct()->pluck('recommended_activities');

        // Przekazanie opcji temperatury i zalecanych aktywności turystycznych do widoku
        return view('recomend', ['temperatureOptions' => $temperatureOptions, 'activities' => $activities]);
    }





    public function recommendCountry(Request $request)
    {
        // Pobierz dane z formularza
        $weather = $request->input('climate');
        $attractions = $request->input('recommended_activities'); // Zmieniono nazwę pola
        $prices = $request->input('budget');

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

        // Pobierz opcje temperatury
        $temperatureOptions = Country::select('weather')->distinct()->pluck('weather');

        // Pobierz opcje aktywności turystycznych
        $activities = Country::distinct()->pluck('recommended_activities');

        return view('recomend', [
            'recommendedCountry' => $recommendedCountry,
            'temperatureOptions' => $temperatureOptions,
            'activities' => $activities // Dodaj opcje aktywności turystycznych do przekazania do widoku
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
