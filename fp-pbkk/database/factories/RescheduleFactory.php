<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

class RescheduleFactory extends Factory
{
    protected $model = \App\Models\Reschedule::class;

    public function definition()
    {
        return [
            'original_travel_date' => $this->faker->date(),
            'new_travel_date' => $this->faker->date(),
            'reason' => $this->faker->sentence,
            'transaction_id' => Transaction::factory(),
        ];
    }
}
