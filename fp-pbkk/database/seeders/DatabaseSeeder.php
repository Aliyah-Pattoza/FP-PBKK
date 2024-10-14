<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Transaction;
use Database\Seeders\DriverSeeder;
use Database\Seeders\CancellationSeeder;
use Database\Seeders\RefundSeeder;
use Database\Seeders\RescheduleSeeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Seed 10 users and related transactions
        User::factory()->count(10)->create()->each(function ($user) {
            Transaction::factory()->count(3)->create([
                'user_id' => $user->id,
            ]);
        });

        // Call the other seeders for 10 records each
        $this->call([
            DriverSeeder::class,
            CancellationSeeder::class,
            RefundSeeder::class,
            RescheduleSeeder::class,
        ]);
    }
}
