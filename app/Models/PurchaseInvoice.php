<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PurchaseInvoice extends Model
{
    protected $fillable = [
        'weight',
        'goods_type',
        'purchase_date',
        'partner_name',
        'supplier_id',
        'supplier_name',
        'supplier_address',
        'supplier_phone',
        'payment_type',
        'purchase_price',
        'dollar_rate',
        'dollar_value',
        'ton_price',
    ];
}
