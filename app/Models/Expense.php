<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    protected $fillable = [
        'expense_date',
        'purchase_price',
        'dollar_rate',
        'dollar_value',
        'details',
    ];
}
