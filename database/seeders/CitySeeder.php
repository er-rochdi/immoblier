<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CitySeeder extends Seeder
{
    public function run(): void
    {
        $cities = ['Paris', 'Lyon', 'Marseille', 'Bordeaux', 'Nice', 'Toulouse', 'Nantes', 'Strasbourg'];

        foreach ($cities as $city) {
            City::create([
                'name' => $city,
                'slug' => Str::slug($city),
            ]);
        }
    }
}
