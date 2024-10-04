<?php

namespace App\Models\Bot;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BotSuccessfulPayment extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'currency',
        'total_amount',
        'invoice_payload',
        'shipping_option_id',
        'order_info'
    ];
}
