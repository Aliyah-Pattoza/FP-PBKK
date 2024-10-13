<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cancellation;

class CancellationSeeder extends Seeder
{
    public function run(): void
    {
        Cancellation::factory(100)->create();
    }
}
