<?php

namespace App\Enums;

enum BotChatType: string
{
    use EnumHelpers;

    case Private = 'private';
    case Group = 'group';
    case Channel = 'channel';
}
