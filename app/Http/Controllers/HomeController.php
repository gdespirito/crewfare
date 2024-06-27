<?php

namespace App\Http\Controllers;

use App\Actions\GetCountries;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;
use Inertia\Inertia;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, GetCountries $getCountries)
    {
        $countries = collect($getCountries->get());
        $regions = $countries->map(fn (array $country) => $country['region'])->unique()->values();

        $currentRegion = $request->get('region');
        if ($currentRegion && ! $regions->contains($currentRegion)) {
            throw new \ValueError('The selected region is invalid.');
        }

        $countries = $this->filterCountries($countries, $currentRegion);
        $countries = $countries->take(10)->map(function ($country) {
            return [
                'id' => $country['cca3'],
                'name' => $country['name'],
                'capital' => $country['capital'][0] ?? null,
                'flag' => $country['flag'],
                'population' => $country['population'] ?? 0,
            ];
        })->values();

        return Inertia::render('Home', [
            'currentRegion' => $currentRegion,
            'countries' => $countries,
            'regions' => $regions,
        ]);
    }

    protected function filterCountries(
        Collection $countries,
        ?string $currentRegion
    ): Collection {

        $countries = $countries->sortByDesc('population');
        if ($currentRegion) {
            $countries = $countries->filter(fn (array $country) => $country['region'] == $currentRegion);
        }

        return $countries;
    }

}
