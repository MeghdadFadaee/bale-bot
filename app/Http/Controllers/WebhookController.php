<?php

namespace App\Http\Controllers;

use App\Models\Log;
use Illuminate\Http\Request;
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

        return $this->ok(true);
    }
}
