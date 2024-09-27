<?php

namespace App\Helpers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BotRequest extends Request
{
    public static function validUsername(?string $username): bool
    {
        $username = Str::of($username)->snake()->upper();
        return !empty(env($username.'_TOKEN'));
    }

    public static function resolveUsername(): ?string
    {
        $botName = request()->route('bot_name');
        return self::validUsername($botName) ? $botName : null;
    }

    public static function resolveRealToken(): ?string
    {
        $botName = request()->route('bot_name');
        $botName = Str::of($botName)->snake()->upper();

        return env($botName.'_TOKEN');
    }
}
