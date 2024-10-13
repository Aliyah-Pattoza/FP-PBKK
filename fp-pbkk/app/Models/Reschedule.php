<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reschedule extends Model
{
    use HasFactory;

    protected $table = 'reschedules';

    protected $fillable = [
        'original_travel_date',
        'new_travel_date',
        'reason',
        'transaction_id',
    ];

    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }
}
