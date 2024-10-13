<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

class VehicleFactory extends Factory
{
    protected $model = \App\Models\Vehicle::class;

    public function definition()
    {
        return [
            'tipe_kendaraan' => $this->faker->randomElement(['mobil', 'motor', 'bus']),
            'brand' => $this->faker->company,
            'model' => $this->faker->word,
            'capacity' => $this->faker->numberBetween(2, 50),
            'plate' => strtoupper($this->faker->bothify('?? ####')),
            'rental_rate' => $this->faker->randomFloat(2, 50, 500),
            'status' => $this->faker->randomElement(['tersedia', 'disewa', 'dalam perbaikan']),
        ];
    }
}
