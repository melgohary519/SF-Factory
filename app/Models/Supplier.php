<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    //
    protected $fillable = [
        'name',
        'phone',
        'address',
    ];


    public function invoices()
    {
        return $this->hasMany(PurchaseInvoice::class);
    }



}
