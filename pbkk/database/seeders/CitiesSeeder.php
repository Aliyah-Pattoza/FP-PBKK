<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\City;

class CitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cities = [
            [
                'name' => 'Jakarta',
                'description' => 'The capital city of Indonesia.',
                'slug' => 'jkt',
                'location' => 'Indonesia',
            ],
            [
                'name' => 'Bandung',
                'description' => 'A beautiful city in West Java.',
                'slug' => 'bandung',
                'location' => 'Indonesia',
            ],
            [
                'name' => 'Surabaya',
                'description' => 'A large port city on the island of Java.',
                'slug' => 'sby',
                'location' => 'Indonesia',
            ]
        ];

        foreach ($cities as $city) {
            City::create($city);
        }
    }
}
