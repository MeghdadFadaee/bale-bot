<?php

namespace App\Models\Bot;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BotInlineKeyboardButton extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'text',
        'url',
        'callback_data'
    ];
}
