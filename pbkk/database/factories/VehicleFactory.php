<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Vehicle;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vehicle>
 */
class VehicleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Vehicle::class;

    public function definition(): array
    {
        return [
            'type' => $this->faker->randomElement(['Car', 'Van', 'Bus']),
            'slug' => $this->faker->slug,
            'brand' => $this->faker->company,
            'model' => $this->faker->word,
            'capacity' => $this->faker->numberBetween(2, 50),
            'plate_number' => $this->faker->unique()->bothify('?? ### ??'),
            'status' => $this->faker->randomElement(['available', 'unavailable']),
        ];
    }
}
