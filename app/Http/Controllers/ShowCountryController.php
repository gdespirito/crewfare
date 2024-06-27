<?php

namespace App\Http\Controllers;

use App\Actions\GetCountries;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ShowCountryController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, GetCountries $getCountriesService, string $countryCode)
    {
        $countries = collect($getCountriesService->get());

        $country = $countries->first(function($country) use ($countryCode) {
            return $country['cca3'] == $countryCode;
        });

        return Inertia::render('Countries/Show', [
            'country' => $country,
        ]);
    }
}
