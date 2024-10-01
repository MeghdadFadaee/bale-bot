<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


/**
 * @property Message $message
 * @property int $update_id
 */
class BotUpdateRequest extends FormRequest
{
}

/**
 * @property Chat $chat
 * @property int $date
 * @property From $from
 * @property string $text
 * @property int $message_id
 */
class Message
{
}

/**
 * @property int $id
 * @property string $type
 * @property array $photo
 * @property ?string $username
 * @property ?string $first_name
 */
class Chat
{

}

/**
 * @property int $id
 * @property bool $is_bot
 * @property ?string $username
 * @property ?string $last_name
 * @property ?string $first_name
 */
class From
{

}