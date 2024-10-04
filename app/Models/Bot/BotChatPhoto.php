<?php

namespace App\Models\Bot;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BotChatPhoto extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'small_file_id',
        'small_file_unique_id',
        'big_file_id',
        'big_file_unique_id'
    ];
}
