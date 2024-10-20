<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $table = 'vehicles';

    protected $fillable = [
        'id',
        'tipe_kendaraan',
        'brand',
        'capacity',
        'plate',
        'rental_rate',
        'status',
        'created_at',
        'updated_at',
    ];
}
