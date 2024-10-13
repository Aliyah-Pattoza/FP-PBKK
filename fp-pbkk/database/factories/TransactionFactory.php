<?php

namespace Database\Factories;

use App\Models\Transaction;
use App\Models\User;
use App\Models\Vehicle;
use App\Models\Package;
use Illuminate\Database\Eloquent\Factories\Factory;

class TransactionFactory extends Factory
{
    protected $model = Transaction::class;

    public function definition()
    {
        static $transactionCounter = 1;

        return [
            'id' => 'TXN' . str_pad($transactionCounter++, 4, '0', STR_PAD_LEFT), // Custom transaction ID
            'package_id' => Package::factory(), // Foreign key to Package
            'vehicle_id' => Vehicle::factory(), // Foreign key to Vehicle
            'user_id' => User::factory(), // Foreign key to User
            'transaction_date' => $this->faker->date(),
            'status' => $this->faker->randomElement(['Success', 'Canceled', 'Rescheduled', 'Refunded']),
            'total_price' => $this->faker->randomFloat(2, 100, 1000), // Price with two decimal points
            'person_number' => $this->faker->numberBetween(1, 10), // Number of people
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
