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
    public function transfers()
    {
        return $this->hasMany(Transfer::class, 'person_id')->where('person_type', 'trader');
    }
}
