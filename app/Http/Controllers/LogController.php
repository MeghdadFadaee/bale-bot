<?php

namespace App\Http\Controllers;

use App\Models\Log;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class LogController extends Controller
{
    public function index(Request $request, string $bot_name, string $token): JsonResponse
    {
        return $this->ok(
            Log::query()->where(compact('bot_name'))->get()
        );
    }

    public function store(Request $request, string $bot_name, string $token): JsonResponse
    {
        $log = Log::logRequest();
        return $this->ok();
    }

    public function show(Request $request, string $bot_name, string $token, Log $log): JsonResponse
    {
        return $this->ok($log);
    }

    public function update(Request $request, string $bot_name, string $token, Log $log): JsonResponse
    {
        return $this->ok($log);
    }

    public function destroy(Request $request, string $bot_name, string $token, Log $log): JsonResponse
    {
        return $this->ok($log);
    }
}
