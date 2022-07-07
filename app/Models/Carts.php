<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carts extends Model
{
    use HasFactory;
    protected $fillable = [
        'orders_id',
        'type',
        'country',
        'price',
        'weight',
        'rate',
        'shipping',
        'vat'
    ];
}
