<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Inertia\Inertia;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $countries = collect($this->getCachedCountries());

        $regions = $countries->map(fn (array $country) => $country['region'])->unique()->values();
        $currentRegion = $request->get('region');
        if ($currentRegion && ! $regions->contains($currentRegion)) {
            throw new \ValueError('The selected region is invalid.');
        }

        $countries = $countries->sortByDesc('population');
        if ($currentRegion) {
            $countries = $countries->filter(fn (array $country) => $country['region'] == $currentRegion);
        }
        $countries = $countries->take(10)->values();

        return Inertia::render('Home', [
            'currentRegion' => $currentRegion,
            'countries' => $countries,
            'regions' => $regions,
        ]);
    }

    protected function getCountries(): array
    {
        $response = Http::get('https://restcountries.com/v3.1/all');

        return $response->json();
    }

    /**
     * @return mixed
     */
    public function getCachedCountries(): array
    {
        $cacheLifetime = now()->addMinutes(60);

        return cache()->remember(key: 'countries', ttl: $cacheLifetime, callback: function () {
            return $this->getCountries();
        });
    }
}
