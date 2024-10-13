<?php

namespace Database\Factories;

use App\Models\PackageTransaction;
use Illuminate\Database\Eloquent\Factories\Factory;

class PackageTransactionFactory extends Factory
{
    protected $model = PackageTransaction::class;

    public function definition()
    {
        return [
            'transaction_id' => \App\Models\Transaction::factory(),
            'package_id' => \App\Models\Package::factory(),
        ];
    }
}

