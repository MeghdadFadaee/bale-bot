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
        $url = self::getUrl('/projects/{current_project}/releases');

        $headers = [
            'Authorization' => 'Bearer '.env('LIARA_TOKEN'),
        ];

        return Http::withHeaders($headers)
            ->get($url)
            ->json('total', $default);
    }
}
