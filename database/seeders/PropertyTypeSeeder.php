<?php

namespace Database\Seeders;

use App\Models\PropertyType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PropertyTypeSeeder extends Seeder
{
    public function run(): void
    {
        $types = ['Appartement', 'Maison', 'Villa', 'Studio', 'Loft', 'Bureau', 'Terrain'];

        foreach ($types as $type) {
            PropertyType::create([
                'name' => $type,
                'slug' => Str::slug($type),
            ]);
        }
    }
}
