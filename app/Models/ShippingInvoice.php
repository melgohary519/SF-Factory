<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShippingInvoice extends Model
{
    //
    protected $fillable = [
        "type",
        "invoice_number",
        "shipping_fee",
        "shipping_dollar_rate",
        "shipping_dollar_value",
        "car_owner_name",
        "car_type",
    ];
}
