<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $table = 'users';

    protected $fillable = [
        'nama_client',
        'email_client',
        'phone_client',
        'points',
    ];

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
