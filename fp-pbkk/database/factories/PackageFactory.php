<?php

namespace Database\Factories;

use App\Models\Package;
use App\Models\Transaction;
use Illuminate\Database\Eloquent\Factories\Factory;

class PackageFactory extends Factory
{
    protected $model = Package::class;

    public function definition()
    {
        return [
            'name_package' => $this->faker->word,
            'destination' => $this->faker->city,
            'travel_date' => $this->faker->date(),
            'price' => $this->faker->randomFloat(2, 100, 1000),
            'status' => $this->faker->randomElement(['available', 'booked', 'expired']),
            'transaction_id' => Transaction::factory(),
        ];
    }
}
