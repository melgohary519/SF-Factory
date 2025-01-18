<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $fillable = [
        'weight',
        'goods_type',
        'inventory_name',
        'purchase_date',
        'partner_name',
        'supplier_name',
        'payment_type',
        'purchase_price',
        'dollar_rate',
        'dollar_value',
    ];
}
