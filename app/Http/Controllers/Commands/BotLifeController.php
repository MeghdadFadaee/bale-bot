<?php

namespace App\Http\Controllers\Commands;

use Illuminate\Support\Str;
use App\Models\Bot\BotMessage;

trait BotLifeController
{
    public function default(BotMessage $message): bool
    {
        $this->bot->post('sendMessage', [
            'chat_id' => $message->chat->chat_id,
            'text' => 'Unknown command',
            'reply_to_message_id' => $message->message_id,
        ]);
        return true;
    }

    public function isPing(string $text): bool
    {
        return Str::of($text)->lower()->is('ping');
    }

    public function pong(BotMessage $message): bool
    {
        $this->bot->post('sendMessage', [
            'chat_id' => $message->chat->chat_id,
            'text' => 'Pong',
            'reply_to_message_id' => $message->message_id,
        ]);
        return true;
    }

    public function isNumber(string $text): bool
    {
        return is_numeric($text);
    }

    public function plusOne(BotMessage $message): bool
    {
        $this->bot->post('sendMessage', [
            'chat_id' => $message->chat->chat_id,
            'text' => ((int) $message->text) + 1,
            'reply_to_message_id' => $message->message_id,
        ]);
        return true;
    }
}