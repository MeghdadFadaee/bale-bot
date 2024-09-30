<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Http;
use stdClass;

class BaleBot
{
    public string $base_url;
    public ?string $token;
    public ?string $username;

    public static function make(...$arg): static
    {
        return new static($arg);
    }

    public function __construct()
    {
        $this->base_url = config('bale-api.base_url');
        $this->token = BotRequest::resolveRealToken();
        $this->username = BotRequest::resolveUsername();
    }

    public function getUrl(string $methode): string
    {
        return "$this->base_url/bot$this->token/$methode";
    }

    /**
     * @return object{ok: bool, result: mixed, description: string}
     */
    public function get(string $methode): stdClass
    {
        return json_decode(Http::get($this->getUrl($methode))->body());
    }

    /**
     * @return object{ok: bool, result: mixed, description: string}
     */
    public function post(string $methode, array $data = []): stdClass
    {
        return json_decode(Http::post($this->getUrl($methode), $data)->body());
    }
}
