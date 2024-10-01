<?php

namespace App\Http\Controllers\Commands;

use Illuminate\Support\Str;
use App\Models\Bot\BotMessage;

trait JsonController
{
    public function isJson(string $text): bool
    {
        return Str::of($text)->isJson();
    }

    public function prettyJson(BotMessage $message): bool
    {
        $json = json_decode($message->text, true);
        $prettyJson = json_encode($json, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        $this->bot->reply($message, $prettyJson);
        return true;
    }
}