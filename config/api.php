<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Bale Api
    |--------------------------------------------------------------------------
    */

    'bale_base_url' => 'https://tapi.bale.ai',

    /*
    |--------------------------------------------------------------------------
    | Liara Api
    |--------------------------------------------------------------------------
    */

    'liara_base_url' => \App\Helpers\LiaraApi::BASE_URL,

    'liara_token' => env('LIARA_TOKEN'),

    'current_project' => env('CURRENT_PROJECT'),

    'releases_count' => \App\Helpers\LiaraApi::releasesCount(),
];
