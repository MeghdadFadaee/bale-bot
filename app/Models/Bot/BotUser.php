<?php

namespace App\Models\Bot;

use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;


/**
 * @property int $id
 * @property Collection<BotMessage> $messages
 * @property int $user_id
 * @property bool $is_bot
 * @property string $username
 * @property string $first_name
 * @property string $last_name
 */
class BotUser extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'is_bot',
        'username',
        'first_name',
        'last_name',
    ];

    protected $casts = [
        'is_bot' => 'boolean',
    ];

    public function messages(): HasMany
    {
        return $this->hasMany(BotMessage::class, 'from_id');
    }
}
