<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;

    protected $table = 'drivers';

    protected $fillable = [
        'nik_driver',
        'name_driver',
        'email_driver',
        'phone_driver',
    ];

    public function packages()
    {
        return $this->hasMany(Package::class, 'driver_id');
    }
}
