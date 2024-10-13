<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackageTransaction extends Model
{
    use HasFactory;

    protected $table = 'package_transaction';

    protected $fillable = ['package_id', 'transaction_id'];
}