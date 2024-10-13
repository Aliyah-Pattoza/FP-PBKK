<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $table = 'transactions';

    protected $fillable = [
        'transaction_date',
        'status',
        'total_price',
        'person_number',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function cancellations()
    {
        return $this->hasMany(Cancellation::class);
    }

    public function refunds()
    {
        return $this->hasMany(Refund::class);
    }

    public function reschedules()
    {
        return $this->hasMany(Reschedule::class);
    }

    public function packages()
    {
        return $this->belongsToMany(Package::class, 'package_transaction');
    }
}
