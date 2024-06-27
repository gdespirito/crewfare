<?php

use App\Actions\GetCountries;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Http;

describe(GetCountries::class, function () {

    it('gets the countries from the given API', function () {
        Http::fake(function (Request $request) {
            return Http::response([
                [
                    'name' => ['common' => 'Chile'],
                    'population' => '18000000',
                ],
                [
                    'name' => ['common' => 'Argentina'],
                    'population' => '35000000',
                ],
            ], 200);
        });

        $countries = app(GetCountries::class)->get();

        Http::assertSent(function (Request $request) {
            return $request->url() == 'https://restcountries.com/v3.1/all';
        });

        expect($countries)->toBe([
            [
                'name' => ['common' => 'Chile'],
                'population' => '18000000',
            ],
            [
                'name' => ['common' => 'Argentina'],
                'population' => '35000000',
            ],
        ]);
    });

    it('caches the result', function () {
        Http::fakeSequence()
            ->push([
                [
                    'name' => ['common' => 'Chile'],
                    'population' => '18000000',
                ],
                [
                    'name' => ['common' => 'Argentina'],
                    'population' => '35000000',
                ],
            ], 200)
            ->push([
                [
                    'name' => ['common' => 'Chile'],
                    'population' => '18000000',
                ],
                [
                    'name' => ['common' => 'Peru'],
                    'population' => '35000000',
                ],
            ], 200);

        app(GetCountries::class)->get();

        $countries = app(GetCountries::class)->get();

        Http::assertSentCount(1);

        expect($countries)->toBe([
            [
                'name' => ['common' => 'Chile'],
                'population' => '18000000',
            ],
            [
                'name' => ['common' => 'Argentina'],
                'population' => '35000000',
            ],
        ]);
    });
});
