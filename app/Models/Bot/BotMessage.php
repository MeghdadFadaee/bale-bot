<?php

namespace App\Models\Bot;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;


/**
 * @property int $id
 * @property BotChat $chat
 * @property BotUser $from
 * @property int $update_id
 * @property int $message_id
 * @property int $chat_id
 * @property int $from_id
 * @property string $bot_name
 * @property int $date
 * @property string $text
 */
class BotMessage extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'update_id',
        'message_id',
        'chat_id',
        'from_id',
        'bot_name',
        'date',
        'text',
    ];

    public function chat(): BelongsTo
    {
        return $this->belongsTo(BotChat::class);
    }

    public function from(): BelongsTo
    {
        return $this->belongsTo(BotUser::class);
    }
}
