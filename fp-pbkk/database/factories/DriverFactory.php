<?php

namespace Database\Factories;

use App\Models\Driver;
use Illuminate\Database\Eloquent\Factories\Factory;

class DriverFactory extends Factory
{
    protected $model = Driver::class;

    public function definition()
    {
        return [
            'nik_driver' => $this->faker->unique()->randomNumber(),
            'name_driver' => $this->faker->name,
            'email_driver' => $this->faker->email,  // Nama kolom yang benar
            'phone_driver' => $this->faker->phoneNumber,
        ];
    }
}
