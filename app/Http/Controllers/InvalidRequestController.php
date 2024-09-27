<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class InvalidRequestController extends Controller
{
    public static function invalidUsername(): JsonResponse
    {
        return (new static)->forbidden('invalid request!');
    }

    public static function invalidToken(): JsonResponse
    {
        return (new static)->forbidden('invalid request!');
    }

    public function fallback(Request $request): JsonResponse
    {
        return $this->notFound();
    }
}
