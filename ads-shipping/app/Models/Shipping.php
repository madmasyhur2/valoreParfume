<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    use HasFactory;

    protected $table = 'shippings';

    protected $fillable = [
        'distance', 
        'delivery_time_economy',
        'delivery_time_regular',
        'delivery_time_express',
        'fee_economy',
        'fee_regular',
        'fee_express'
    ];
}
