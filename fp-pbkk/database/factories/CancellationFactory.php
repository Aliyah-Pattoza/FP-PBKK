<?php

namespace Database\Factories;

use App\Models\Transaction;
use Illuminate\Database\Eloquent\Factories\Factory;

class CancellationFactory extends Factory
{
    public function definition()
    {
        return [
            'reason' => $this->faker->sentence,
            'transaction_id' => Transaction::factory(), // Menggunakan factory Transaction yang benar
        ];
    }
}
