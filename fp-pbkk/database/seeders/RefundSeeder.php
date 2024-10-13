<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Refund;

class RefundSeeder extends Seeder
{
    public function run(): void
    {
        Refund::factory(100)->create();
    }
}
