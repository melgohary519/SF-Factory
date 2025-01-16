<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SalesInvoice extends Model
{
    protected $fillable = [
        'weight',
        'goods_type',
        'sale_date',
        'partner_name',
        'trader_id', 
        'trader_name',
        'trader_address', 
        'trader_phone', 
        'payment_type',
        'sale_price',
        'dollar_rate',
        'dollar_value',
        'shipping_fee',
        'shipping_dollar_rate',
        'shipping_dollar_value',
        'car_owner_name',
        'car_type',
    ];

    public function trader()
    {
        return $this->belongsTo(Trader::class);
    }
}
