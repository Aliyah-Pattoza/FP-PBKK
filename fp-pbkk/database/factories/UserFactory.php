<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition()
    {
        static $userCounter = 1; // Start counter
        $domains = ['gmail.com', 'yahoo.com', 'outlook.com', 'example.com', 'iCloud.com', 'Mac.com']; // Available domains

        return [
            'id' => 'CLT' . str_pad($userCounter++, 4, '0', STR_PAD_LEFT), // Generates unique ID like CLT0001, CLT0002
            'nama_client' => $this->faker->name,
            'email_client' => $this->faker->unique()->userName . '@' . $this->faker->randomElement($domains), // Random domain
            'phone_client' => '+62 ' . $this->faker->unique()->numerify('8##-####-####'),
            'points' => $this->faker->numberBetween(0, 100),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
