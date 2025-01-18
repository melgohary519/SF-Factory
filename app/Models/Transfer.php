<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transfer extends Model
{
    use HasFactory;

    protected $fillable = [
        'reason',
        'type',
        'person_type',
        'transfer_date',
        'amount',
        'dollar_rate',
        'dollar_value',
        'person_id',
        'person_name',
        'person_address',
        'person_phone',
        'recipient_name',
        'recipient_phone',
    ];
}
