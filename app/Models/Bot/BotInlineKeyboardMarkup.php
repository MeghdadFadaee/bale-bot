<?php

namespace App\Models\Bot;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BotInlineKeyboardMarkup extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'inline_keyboard'
    ];
}
