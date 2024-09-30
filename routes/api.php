<?php

use App\Http\Controllers\InvalidRequestController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WebhookController;
use App\Http\Middleware\RequiredBotToken;
use App\Http\Middleware\RequiredBotUsername;
use Illuminate\Support\Facades\Route;

Route::name('home.')
    ->prefix('')
    ->controller(HomeController::class)
    ->group(function () {
        Route::get('/', 'index')->name('index');

        Route::get('/{bot_name}/me', 'me')
            ->middleware(RequiredBotUsername::class)
            ->name('me');
    });

Route::name('webhook.')
    ->prefix('{bot_name}/webhook/{token}')
    ->middleware([RequiredBotUsername::class, RequiredBotToken::class])
    ->controller(WebhookController::class)
    ->group(function () {
        Route::get('/info', 'info')->name('info');
        Route::get('/set', 'set')->name('set');
        Route::any('/update', 'update')->name('update');
    });


Route::fallback([InvalidRequestController::class, 'fallback']);
