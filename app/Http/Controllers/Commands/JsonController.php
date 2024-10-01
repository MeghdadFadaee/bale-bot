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

    public function beautifulJson(BotMessage $message): bool
    {
        $json = json_decode($message->text, true);
        $this->bot->post('sendMessage', [
            'chat_id' => $message->chat->chat_id,
            'text' => json_encode($json, JSON_PRETTY_PRINT),
            'reply_to_message_id' => $message->message_id,
        ]);
        return true;
    }
}