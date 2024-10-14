<?php

namespace Database\Factories;

use App\Models\Transaction;
use Illuminate\Database\Eloquent\Factories\Factory;

class CancellationFactory extends Factory
{
    protected $model = \App\Models\Cancellation::class;

    public function definition()
    {
        static $cancelCounter = 1;

        return [
            'id_cancelled' => 'CNL' . str_pad($cancelCounter++, 4, '0', STR_PAD_LEFT),
            'reason' => 'sakit',
            'transaction_id' => Transaction::factory(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
