<?php

namespace App\Models\Bot;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BotContact extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'phone_number',
        'first_name',
        'last_name',
        'user_id'
    ];
}
