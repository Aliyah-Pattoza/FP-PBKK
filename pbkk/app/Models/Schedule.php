<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'package_id',
        'travel_date',
        'slug',
        'available_capacity',
    ];

    public function package()
    {
        return $this->belongsTo(Package::class);
    }

    public function getRouteKeyName()
    {
        return 'slug'; // Use slug for route model binding
    }
}
