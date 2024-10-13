<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

class TransactionFactory extends Factory
{
    protected $model = \App\Models\Transaction::class;

    public function definition()
    {
        return [
            'user_id' => \App\Models\User::factory(),
            'transaction_date' => $this->faker->date(),
            'status' => $this->faker->randomElement(['completed', 'pending', 'failed']),
            'total_price' => $this->faker->randomFloat(2, 100, 1000),
            'person_number' => $this->faker->numberBetween(1, 5),
        ];
    }
}
