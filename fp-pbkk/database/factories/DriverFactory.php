<?php

namespace Database\Factories;

use App\Models\Driver;
use Illuminate\Database\Eloquent\Factories\Factory;

class DriverFactory extends Factory
{
    protected $model = Driver::class;

    public function definition()
    {
        static $driverCounter = 1; // To increment the driver ID

        return [
            'id_driver' => 'DRV' . str_pad($driverCounter++, 4, '0', STR_PAD_LEFT), // Custom user ID CXXXX
            'nik_driver' => $this->faker->unique()->numerify('###########'), // Unique NIK (driver's ID)
            'name_driver' => $this->faker->name,
            'email_driver' => $this->faker->unique()->safeEmail,  // Unique email
            'phone_driver' => '+62 ' . $this->faker->unique()->numerify('8##-####-####'), // Unique phone number
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
