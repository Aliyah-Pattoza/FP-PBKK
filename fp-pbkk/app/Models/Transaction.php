<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $table = 'transactions';

    protected $fillable = [
        'id',
        'package_id',
        'user_id',
        'vehicle_id',
        'transaction_date',
        'status',
        'total_price',
        'person_number',
        'created_at',
        'updated_at'
    ];

    // Define relationships if needed
}
