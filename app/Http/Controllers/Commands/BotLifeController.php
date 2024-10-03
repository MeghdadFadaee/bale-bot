<?php

namespace App\Http\Controllers\Commands;

use App\Helpers\LiaraApi;
use Illuminate\Support\Str;
use App\Models\Bot\BotMessage;

trait BotLifeController
{
    public function default(BotMessage $message): bool
    {
        $this->bot->reply($message, 'Unknown command');
        return true;
    }

    public function isPing(string $text): bool
    {
        return Str::of($text)->lower()->is('ping');
    }

    public function pong(BotMessage $message): bool
    {
        $this->bot->reply($message, 'Pong');
        return true;
    }

    public function isNumber(string $text): bool
    {
        return is_numeric($text);
    }

    public function plusReleasesCount(BotMessage $message): bool
    {
        $newNumber = ((int) $message->text) + LiaraApi::releasesCount();
        $this->bot->reply($message, "$newNumber");
        return true;
    }
}