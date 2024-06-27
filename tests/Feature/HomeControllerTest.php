<?php

use App\Actions\GetCountries;
use Inertia\Testing\AssertableInertia as Assert;

it('loads the homepage', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
});

it('show countries with more population', function () {
    $mockGetCountriesService = $this->mock(GetCountries::class);
    $mockGetCountriesService->shouldReceive('get')
        ->andReturn([
            [
                'name' => ['common' => 'Common 1'],
                'capital' => ['Capital 1'],
                'cca3' => 'CHI',
                'flag' => '🇨🇱',
                'region' => 'Americas',
                'population' => 100,
            ],
            [
                'name' => ['common' => 'Common 2'],
                'capital' => ['Capital 2'],
                'cca3' => 'ARG',
                'flag' => '🇦🇷',
                'region' => 'Americas',
                'population' => 200,
            ],
            [
                'name' => ['common' => 'Common 3'],
                'capital' => ['Capital 3'],
                'cca3' => 'PER',
                'flag' => '🇵🇪',
                'region' => 'Americas',
                'population' => 90,
            ],
        ]);

    $this->get('/')
        ->assertStatus(200)
        ->assertInertia(fn (Assert $page) => $page
            ->component('Home')
            ->where('countries.0.id', 'ARG')
            ->where('countries.1.id', 'CHI')
            ->where('countries.2.id', 'PER')
        );

});

it('show countries filtered by region', function () {
    $mockGetCountriesService = $this->mock(GetCountries::class);
    $mockGetCountriesService->shouldReceive('get')
        ->andReturn([
            [
                'name' => ['common' => 'Common 1'],
                'capital' => ['Capital 1'],
                'cca3' => 'CHN',
                'flag' => '',
                'region' => 'Asia',
                'population' => 1000,
            ],
            [
                'name' => ['common' => 'Common 2'],
                'capital' => ['Capital 2'],
                'cca3' => 'ARG',
                'flag' => '',
                'region' => 'Americas',
                'population' => 1500,
            ],
            [
                'name' => ['common' => 'Common 3'],
                'capital' => ['Capital 3'],
                'cca3' => 'BRA',
                'flag' => '',
                'region' => 'Americas',
                'population' => 200,
            ],
            [
                'name' => ['common' => 'Common 4'],
                'capital' => ['Capital 4'],
                'cca3' => 'IND',
                'flag' => '',
                'region' => 'Asia',
                'population' => 990,
            ],
        ]);

    $this->get('/?region=Asia')
        ->assertStatus(200)
        ->assertInertia(fn (Assert $page) => $page
            ->component('Home')
            ->where('countries.0.id', 'CHN')
            ->where('countries.1.id', 'IND')
        );

});
