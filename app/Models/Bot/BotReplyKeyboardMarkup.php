<?php

namespace App\Models\Bot;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BotReplyKeyboardMarkup extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'keyboard'
    ];
}
