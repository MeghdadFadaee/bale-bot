<?php

namespace App\Models\Bot;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BotLocation extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'longitude',
        'latitude'
    ];
}
