<?php

namespace App\Models\Bot;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BotKeyboardButton extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'text',
        'request_contact',
        'request_location'
    ];
}
