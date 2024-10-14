<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class VehicleFactory extends Factory
{
    protected $model = \App\Models\Vehicle::class;

    public function definition()
    {
        static $vehicleCounter = 1;

        $vehicles = [
            // SUV
            ['type' => 'SUV', 'brand' => 'Toyota', 'model' => 'Fortuner', 'capacity' => 7],
            ['type' => 'SUV', 'brand' => 'Mitsubishi', 'model' => 'Pajero Sport', 'capacity' => 7],
            ['type' => 'SUV', 'brand' => 'Nissan', 'model' => 'X-Trail', 'capacity' => 5],
            ['type' => 'SUV', 'brand' => 'Honda', 'model' => 'CR-V', 'capacity' => 5],

            // Sedan
            ['type' => 'Sedan', 'brand' => 'Toyota', 'model' => 'Camry', 'capacity' => 5],
            ['type' => 'Sedan', 'brand' => 'Honda', 'model' => 'Accord', 'capacity' => 5],
            ['type' => 'Sedan', 'brand' => 'BMW', 'model' => '3 Series', 'capacity' => 5],
            ['type' => 'Sedan', 'brand' => 'Mercedes-Benz', 'model' => 'C-Class', 'capacity' => 5],

            // Hatchback
            ['type' => 'Hatchback', 'brand' => 'Honda', 'model' => 'Jazz', 'capacity' => 5],
            ['type' => 'Hatchback', 'brand' => 'Toyota', 'model' => 'Yaris', 'capacity' => 5],
            ['type' => 'Hatchback', 'brand' => 'Ford', 'model' => 'Fiesta', 'capacity' => 5],
            ['type' => 'Hatchback', 'brand' => 'Suzuki', 'model' => 'Swift', 'capacity' => 5],

            // Sport
            ['type' => 'Sport', 'brand' => 'BMW', 'model' => 'M3', 'capacity' => 4],
            ['type' => 'Sport', 'brand' => 'Audi', 'model' => 'R8', 'capacity' => 2],
            ['type' => 'Sport', 'brand' => 'Porsche', 'model' => '911', 'capacity' => 2],
            ['type' => 'Sport', 'brand' => 'Lamborghini', 'model' => 'Huracan', 'capacity' => 2],

            // Van
            ['type' => 'Van', 'brand' => 'Toyota', 'model' => 'Hiace', 'capacity' => 12],
            ['type' => 'Van', 'brand' => 'Hyundai', 'model' => 'H-1', 'capacity' => 11],
            ['type' => 'Van', 'brand' => 'Nissan', 'model' => 'Serena', 'capacity' => 8],
            
            // Pickup
            ['type' => 'Pickup', 'brand' => 'Isuzu', 'model' => 'D-Max', 'capacity' => 2],
            ['type' => 'Pickup', 'brand' => 'Ford', 'model' => 'Ranger', 'capacity' => 4],
            ['type' => 'Pickup', 'brand' => 'Toyota', 'model' => 'Hilux', 'capacity' => 4],

            // LCGC (Low Cost Green Car)
            ['type' => 'LCGC', 'brand' => 'Daihatsu', 'model' => 'Ayla', 'capacity' => 5],
            ['type' => 'LCGC', 'brand' => 'Toyota', 'model' => 'Agya', 'capacity' => 5],

            // Commercial
            ['type' => 'Commercial', 'brand' => 'Mitsubishi', 'model' => 'Colt Diesel', 'capacity' => 3],
            ['type' => 'Commercial', 'brand' => 'Hino', 'model' => '300 Series', 'capacity' => 3],
            ['type' => 'Commercial', 'brand' => 'Suzuki', 'model' => 'Carry', 'capacity' => 2],
        ];

        $vehicle = $this->faker->randomElement($vehicles);

        return [
            'id' => 'VHC' . str_pad($vehicleCounter++, 4, '0', STR_PAD_LEFT), // Custom vehicle ID VHCXXXX
            'tipe_kendaraan' => $vehicle['type'],
            'brand' => $vehicle['brand'],
            'model' => $vehicle['model'],
            'capacity' => $vehicle['capacity'],
            'plate' => strtoupper($this->faker->bothify('?? #### ??')), // Generates random plate number like "L 5412 DF"
            'rental_rate' => $this->faker->randomFloat(2, 150, 1000), // Rental rate between 150 and 1000
            'status' => $this->faker->randomElement(['tersedia', 'disewa', 'dalam perbaikan']),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
