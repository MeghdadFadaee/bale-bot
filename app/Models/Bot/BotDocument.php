<?php

namespace App\Models\Bot;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BotDocument extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'file_id',
        'file_unique_id',
        'thumbnail',
        'file_name',
        'mime_type',
        'file_size'
    ];
}
