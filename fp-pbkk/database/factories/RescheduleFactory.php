<?php

namespace Database\Factories;

use App\Models\Transaction;
use Illuminate\Database\Eloquent\Factories\Factory;

class RescheduleFactory extends Factory
{
    protected $model = \App\Models\Reschedule::class;

    public function definition()
    {
        static $rescheduleCounter = 1;

        return [
            'id_reschedule' => 'RSC' . str_pad($rescheduleCounter++, 4, '0', STR_PAD_LEFT),
            'original_travel_date' => $this->faker->date(),
            'new_travel_date' => $this->faker->dateBetween('+5 days', '+15 days'),
            'reason' => 'alasan pribadi',
            'transaction_id' => Transaction::factory(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
