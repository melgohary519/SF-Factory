<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Trader extends Model
{
    protected $fillable = [
        'name',
        'phone',
        'address',
    ];

    public function invoices()
    {
        return $this->hasMany(SalesInvoice::class);
    }
}
