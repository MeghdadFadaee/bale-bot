<?php

namespace App\Models\Bot;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BotInputMedia extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'type',
        'media',
        'caption'
    ];
}
