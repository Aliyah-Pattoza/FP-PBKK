<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\package_transaction;

class package_transactionSeeder extends Seeder
{
    public function run(): void
    {
        package_transaction::factory(10)->create();
    }
}
