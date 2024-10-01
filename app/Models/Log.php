<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\AsCollection;

class Log extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'json',
        'debug_trace',
    ];

    protected $casts = [
        'json' => AsCollection::class,
        'debug_trace' => AsCollection::class,
    ];

    public static function logRequest(): static
    {
        return static::query()->create([
            'json' => request()->all(),
            'debug_trace' => debug_backtrace()
        ]);
    }
}
