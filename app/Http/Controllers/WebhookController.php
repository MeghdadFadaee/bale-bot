<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Models\Bot\BotChat;
use Illuminate\Support\Arr;
use App\Models\Bot\BotUser;
use Illuminate\Http\Request;
use App\Models\Bot\BotMessage;
use Illuminate\Http\JsonResponse;

class WebhookController extends Controller
{
    public function set(Request $request, string $bot_name, string $token): JsonResponse
    {
        $bale = $this->bot->post(
            methode: 'setWebhook',
            data: [
                'url' => route('webhook.update', compact('bot_name', 'token')),
            ]
        );

        return $this->baleResponse($bale);
    }

    public function info(Request $request, string $bot_name, string $token): JsonResponse
    {
        $bale = $this->bot->get('getWebhookInfo');

        return $this->baleResponse($bale);
    }

    public function update(Request $request, string $bot_name, string $token): JsonResponse
    {
        Log::logRequest();

        $data = $request->all();
        $chat = $this->getBotChat($data);
        $user = $this->getBotUser($data);
        $message = $this->getBotMessage($bot_name, $data, $chat, $user);

        return $this->ok(true);
    }

    public function getBotMessage(string $bot_name, array $data, BotChat $chat, BotUser $user): BotMessage
    {
        return BotMessage::query()->create([
            'update_id' => Arr::get($data, 'update_id'),
            'message_id' => Arr::get($data, 'message.message_id'),
            'chat_id' => $chat->id,
            'from_id' => $user->id,
            'bot_name' => $bot_name,
            'date' => Arr::get($data, 'message.date'),
            'text' => Arr::get($data, 'message.text'),
        ]);
    }

    public function getBotChat(array $data): BotChat
    {
        return BotChat::query()->updateOrCreate([
            'chat_id' => Arr::get($data, 'message.chat.id'),
        ], [
            'type' => Arr::get($data, 'message.chat.type'),
            'photo' => Arr::get($data, 'message.chat.photo'),
            'username' => Arr::get($data, 'message.chat.username'),
            'first_name' => Arr::get($data, 'message.chat.first_name'),
        ]);
    }

    public function getBotUser(array $data): BotUser
    {
        return BotUser::query()->updateOrCreate([
            'user_id' => Arr::get($data, 'message.from.id'),
        ], [
            'is_bot' => Arr::get($data, 'message.from.is_bot'),
            'username' => Arr::get($data, 'message.from.username'),
            'last_name' => Arr::get($data, 'message.from.last_name'),
            'first_name' => Arr::get($data, 'message.from.first_name'),
        ]);
    }
}
