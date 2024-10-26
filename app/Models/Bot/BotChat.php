<?php

namespace App\Models\Bot;

use App\Enums\BotChatType;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property int $chat_id
 * @property BotChatType $type
 * @property string $title
 * @property array $photo
 * @property string $username
 * @property string $first_name
 * @property string $last_name
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Carbon $deleted_at
 * @property Collection<BotMessage> $messages
 */
class BotChat extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'chat_id',
        'type',
        'title',
        'photo',
        'username',
        'first_name',
        'last_name',
    ];

    protected function casts(): array
    {
        return [
            'type' => BotChatType::class,
            'photo' => 'json',
        ];
    }

    public function messages(): HasMany
    {
        return $this->hasMany(BotMessage::class, 'chat_id');
    }
}
