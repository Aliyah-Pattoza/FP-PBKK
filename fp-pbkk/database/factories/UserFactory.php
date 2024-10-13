<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

class UserFactory extends Factory
{
    protected $model = \App\Models\User::class;

    public function definition()
    {
        return [
            'nama_client' => $this->faker->name,
            'email_client' => $this->faker->unique()->safeEmail,
            'phone_client' => $this->faker->phoneNumber,
            'points' => $this->faker->numberBetween(0, 1000),
        ];
    }
}
