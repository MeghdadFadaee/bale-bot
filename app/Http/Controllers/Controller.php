<?php

namespace App\Http\Controllers;

use App\Helpers\BaleBot;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use stdClass;

abstract class Controller
{
    protected BaleBot $bot;

    public function __construct()
    {
        $this->bot = BaleBot::make();
    }

    public function baleResponse(stdClass $response): JsonResponse
    {
        if ($response->ok) {
            return $this->ok($response->result);
        } else {
            return $this->bad([
                'message' => $response->description,
            ]);
        }
    }

    public function ok(mixed $result = null): JsonResponse
    {
        return response()->json([
            'ok' => true,
            'result' => $result,
        ], Response::HTTP_OK);
    }

    public function bad(mixed $result = ['message' => 'bad request!']): JsonResponse
    {
        return response()->json([
            'ok' => false,
            'result' => $result,
        ], Response::HTTP_BAD_REQUEST);
    }

    public function forbidden(string $message): JsonResponse
    {
        return response()->json([
            'ok' => false,
            'result' => [
                'message' => $message,
            ],
        ], Response::HTTP_FORBIDDEN);
    }

    public function notFound(string $message = 'Not found!'): JsonResponse
    {
        return response()->json([
            'ok' => false,
            'result' => [
                'message' => $message,
            ],
        ], Response::HTTP_NOT_FOUND);
    }
}
