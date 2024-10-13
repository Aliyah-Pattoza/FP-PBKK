<?php

namespace Database\Factories;

use App\Models\Refund;
use App\Models\Transaction;
use Illuminate\Database\Eloquent\Factories\Factory;

class RefundFactory extends Factory
{
    protected $model = Refund::class;

    public function definition()
    {
        return [
            'refund_amount' => $this->faker->randomFloat(2, 10, 500),
            'reason' => $this->faker->sentence,
            'transaction_id' => Transaction::factory(), // Menghasilkan transaction_id yang valid
        ];
    }
}
