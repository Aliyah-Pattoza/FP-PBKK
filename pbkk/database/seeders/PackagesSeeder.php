<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Package;

class PackagesSeeder extends Seeder
{
    public function run(): void
    {
        Package::create([
            'name' => 'Package A',
            'slug' => 'package-1',
            'start_city_id' => 1, // ID kota asal
            'destination_city_id' => 2, // ID kota tujuan
            'price' => 100.00,
            'vehicle_id' => 1, // ID kendaraan
        ]);
        
        // Tambahkan data paket lainnya sesuai kebutuhan
    }
}
