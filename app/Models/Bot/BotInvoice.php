<?php

namespace App\Models\Bot;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BotInvoice extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'payload',
        'provider_token',
        'start_parameter',
        'currency',
        'total_amount'
    ];
}
