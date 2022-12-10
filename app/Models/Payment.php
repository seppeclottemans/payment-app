<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasTimestamps;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasTimestamps;

    protected $fillable = [
        'payment_id',
        'amount',
        'payment_method',
        'payment_state',
    ];
}
