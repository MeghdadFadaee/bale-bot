<?php

namespace App\Http\Middleware;

use App\Helpers\BotRequest;
use App\Http\Controllers\InvalidRequestController;
use Closure;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class RequiredBotUsername
{
    public function handle(Request $request, Closure $next): JsonResponse
    {
        $botUsername = $request->route('bot_name');

        if (BotRequest::validUsername($botUsername)) {
            return $next($request);
        }

        return InvalidRequestController::invalidUsername();
    }
}
