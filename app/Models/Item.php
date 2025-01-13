<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        'weight',
        'goods_type',
        'purchase_date',
        'partner_name',
        'supplier_name',
        'payment_type',
        'purchase_price',
        'dollar_rate',
        'dollar_value',
    ];
}
