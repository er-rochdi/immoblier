<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Property;
use App\Models\PropertyType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PropertySeeder extends Seeder
{
    public function run(): void
    {
        $cities = City::all();
        $types = PropertyType::all();

        if ($cities->isEmpty() || $types->isEmpty()) {
            return;
        }

        $images = [
            'properties/house1.jpg',
            'properties/house2.jpg',
            'properties/house3.jpg',
            'properties/house4.jpg',
            'properties/house5.jpg',
            'properties/house6.jpg',
            'properties/house7.jpg',
            'properties/house8.jpg',
            'properties/house9.jpg',
            'properties/house10.jpg',
            'properties/house11.jpg',
            'properties/house12.jpg',
            'properties/house13.jpg',
            'properties/house14.jpg',
            'properties/house15.jpg',
        ];

        for ($i = 1; $i <= 20; $i++) {
            $city = $cities->random();
            $type = $types->random();
            $title = $type->name . ' ' . $city->name . ' ' . $i;

            $property = Property::create([
                'title' => $title,
                'slug' => Str::slug($title),
                'description' => 'Une belle propriété située à ' . $city->name . '. Idéal pour une famille ou un investissement. Offrant des prestations de qualité et un cadre de vie exceptionnel.',
                'price' => rand(100000, 1000000),
                'area' => rand(20, 200),
                'bedrooms' => rand(1, 5),
                'bathrooms' => rand(1, 3),
                'status' => 'active',
                'is_featured' => rand(0, 1),
                'city_id' => $city->id,
                'property_type_id' => $type->id,
            ]);

            // Attach 3 random images to each property
            $shuffledImages = collect($images)->shuffle()->take(3);
            foreach ($shuffledImages as $index => $imagePath) {
                $property->images()->create([
                    'image_path' => $imagePath,
                    'sort_order' => $index,
                ]);
            }
        }
    }
}
