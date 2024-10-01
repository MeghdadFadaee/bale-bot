<?php

namespace App\Http\Controllers\Commands;

use App\Models\Bot\BotMessage;
use App\Http\Controllers\Controller;

class CommandHandler extends Controller
{
    use BotLifeController;
    use JsonController;

    public static function handel(BotMessage $message): bool
    {
        return (new static())->handler($message);
    }

    public function handler(BotMessage $message): bool
    {
        return match (true) {
            $this->isPing($message->text) => $this->pong($message),
            $this->isNumber($message->text) => $this->plusReleasesCount($message),
            $this->isJson($message->text) => $this->prettyJson($message),
            default => $this->default($message)
        };
    }
}