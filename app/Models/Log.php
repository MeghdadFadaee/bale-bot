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
        'bot_name',
        'json',
        'debug_trace',
    ];

    protected $casts = [
        'json' => AsCollection::class,
        'debug_trace' => AsCollection::class,
    ];

    public static function createLog(mixed $json): static
    {
        if (!config('app.debug')) {
            return new static();
        }

        return static::query()->create([
            'bot_name' => request()->route('bot_name'),
            'json' => $json,
            'debug_trace' => debug_backtrace(),
        ]);
    }

    public static function logRequest(): static
    {
        return static::createLog(
            request()->all()
        );
    }
}
