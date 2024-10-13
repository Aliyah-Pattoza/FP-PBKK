<?php

namespace Database\Factories;

use App\Models\Transaction;
use Illuminate\Database\Eloquent\Factories\Factory;

class RefundFactory extends Factory
{
    protected $model = \App\Models\Refund::class;

    public function definition()
    {
        static $refundCounter = 1;

        return [
            'id_refund' => 'RFD' . str_pad($refundCounter++, 4, '0', STR_PAD_LEFT),
            'refund_amount' => $this->formatPrice($this->faker->randomFloat(2, 10, 1000)),
            'reason' => 'batal',
            'transaction_id' => Transaction::factory(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }

    private function formatPrice($amount)
    {
        return 'Rp' . number_format($amount, 2, ',', '.');
    }
}
