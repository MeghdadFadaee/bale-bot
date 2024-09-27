<?php

namespace App\Http\Controllers;

use App\Helpers\BotRequest;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Http;

class WebhookController extends Controller
{
    public function set(Request $request, string $botName, string $token): JsonResponse
    {
        return $this->ok([
            'message' => BotRequest::resolveRealToken(),
        ]);
    }

    public function info(Request $request, string $botName): JsonResponse
    {
        $bale = $this->bot->get('getWebhookInfo');

        return $this->baleResponse($bale);
    }
}
