<?php

namespace App\Models\Bot;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BotCallbackQuery extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'from',
        'message',
        'data'
    ];
}
