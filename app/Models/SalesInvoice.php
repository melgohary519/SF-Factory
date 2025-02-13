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
        'ton_price',
        'inventory_name',
    ];

    public function trader()
    {
        return $this->belongsTo(Trader::class);
    }
    public function shipping_invoices()
    {
        return ShippingInvoice::where('invoice_number', $this->id)->where('type','sales')->get();
    }
}
