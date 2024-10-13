<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    protected $table = 'packages';

    protected $fillable = [
        'name_package',
        'type_package',
        'destination',
        'travel_date',
        'price',
        'status',
    ];

    public function transactions()
    {
        return $this->belongsToMany(Transaction::class, 'package_transaction');
    }

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }

    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }
}
