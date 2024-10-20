<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reservation extends Model
{
    use HasFactory;

    // Mass assignable attributes
    protected $fillable = [
        'name',
        'phone_number',
        'reservation_date',
        'number_of_people',
        'notes',
        'status',
    ];

}
