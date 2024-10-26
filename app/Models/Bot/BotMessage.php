<?php

namespace App\Models\Bot;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

// TODO: complete this
class BotMessage extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'message_id',
        'from_id',
        'date',
        'chat_id',
        'forward_from_id',
        'forward_from_chat_id',
        'forward_from_message_id',
        'forward_date',
        'reply_to_message_id',
        'edite_date',
        'text',
        '',
        '',
        '',
        '',
    ];

    protected function casts(): array
    {
        return [
            'date' => 'datetime:U',
            'forward_date' => 'datetime:U',
            'edite_date' => 'datetime:U',
        ];
    }

    public function from(): BelongsTo
    {
        return $this->belongsTo(BotUser::class);
    }

    public function chat(): BelongsTo
    {
        return $this->belongsTo(BotChat::class);
    }

    public function forwardFrom(): BelongsTo
    {
        return $this->belongsTo(BotUser::class);
    }

    public function forwardFromChat(): BelongsTo
    {
        return $this->belongsTo(BotChat::class);
    }

    public function forwardFromMessage(): BelongsTo
    {
        return $this->belongsTo(static::class);
    }

    public function replyToMessage(): BelongsTo
    {
        return $this->belongsTo(static::class);
    }
}
