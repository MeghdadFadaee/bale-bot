<?php

namespace App\Models\Bot;

use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;


/**
 * @property int $id
 * @property Collection<BotMessage> $messages
 * @property int $chat_id
 * @property string $type
 * @property array $photo
 * @property string $username
 * @property string $first_name
 */
class BotChat extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'chat_id',
        'type',
        'photo',
        'username',
        'first_name',
    ];

    protected $casts = [
        'photo' => 'json',
    ];

    public function messages(): HasMany
    {
        return $this->hasMany(BotMessage::class, 'chat_id');
    }
}
