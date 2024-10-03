<?php

namespace App\Helpers;

use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;

class LiaraApi
{
    public const BASE_URL = 'https://api.iran.liara.ir';

    public static function getUrl(string $uri): string
    {
        return Str::of($uri)
            ->start(self::BASE_URL.'/v1')
            ->replace('{current_project}', env('CURRENT_PROJECT'));
    }

    public static function releasesCount(int $default = 0): int
    {
        return 9;
        try {
            $url = self::getUrl('/projects/{current_project}/releases');

            $options = [
                'http' => [
                    'header' => "Authorization: Bearer ".env('LIARA_TOKEN'),
                    'method' => 'GET',
                ],
            ];

            $context = stream_context_create($options);
            $result = file_get_contents($url, false, $context);
            $response = json_decode($result, true);

            return Arr::get($response, 'total', $default);
        } catch (\Exception) {
            return $default;
        }
    }
}