<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Reschedule;

class RescheduleSeeder extends Seeder
{
    public function run(): void
    {
        Reschedule::factory(100)->create();
    }
}
