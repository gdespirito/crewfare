<?php

namespace App\Actions;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;

class GetCountries
{
    public function get(): array
    {
        $cacheLifetime = now()->addMinutes(60);

        return cache()->remember(key: 'countries', ttl: $cacheLifetime, callback: function () {
            return $this->getCountries();
        });
    }

    protected function getCountries(): array
    {
        $response = Http::get('https://restcountries.com/v3.1/all');

        return $response->json();
    }
}
