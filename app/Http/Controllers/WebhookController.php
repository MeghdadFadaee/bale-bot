<?php

namespace App\Http\Controllers;

use App\Helpers\BotRequest;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class WebhookController extends Controller
{
    public function set(Request $request, string $botName, string $token): JsonResponse
    {
        return  $this->ok([
            'message' => BotRequest::resolveRealToken(),
        ]);
    }
}
