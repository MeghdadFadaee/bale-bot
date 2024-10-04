<?php

namespace App\Models\Bot;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BotFile extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'file_id',
        'file_unique_id',
        'file_size',
        'file_path'
    ];
}
