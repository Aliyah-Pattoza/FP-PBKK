<?php

namespace Database\Factories;

use App\Models\Package;
use Illuminate\Database\Eloquent\Factories\Factory;

class PackageFactory extends Factory
{
    protected $model = Package::class;

    public function definition()
    {
        return [
            'id' => 'PKG' . str_pad($this->faker->unique()->numberBetween(1, 9999), 4, '0', STR_PAD_LEFT), // Custom ID starting with 'PKG'
            'name_package' => $this->faker->sentence(3),
            'destination' => $this->faker->city,
            'travel_date' => $this->faker->date(),
            // Store price as a decimal, not as a string with currency symbols
            'price' => $this->faker->randomFloat(2, 1000, 10000), // Random price between 1000 and 10000
            'status' => $this->faker->randomElement(['Available', 'Booked', 'Expired']),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
