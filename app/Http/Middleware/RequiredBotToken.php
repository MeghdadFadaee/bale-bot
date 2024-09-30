<?php

namespace App\Http\Middleware;

use App\Helpers\BotRequest;
use App\Http\Controllers\InvalidRequestController;
use Closure;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RequiredBotToken
{
    public function handle(Request $request, Closure $next): Response|JsonResponse
    {
        $token = $request->route('token');
        $realToken = BotRequest::resolveRealToken();

        if (Str::of($token)->is($realToken)) {
            return $next($request);
        }

        return InvalidRequestController::invalidToken();
    }
}
