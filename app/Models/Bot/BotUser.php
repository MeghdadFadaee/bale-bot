<?php

namespace App\Models\Bot;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property int $user_id
 * @property bool $is_bot
 * @property string $username
 * @property string $first_name
 * @property string $last_name
 * @property string $language_code
 */
class BotUser extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'is_bot',
        'username',
        'first_name',
        'last_name',
        'language_code',
    ];

    protected function casts(): array
    {
        return [
            'is_bot' => 'boolean',
        ];
    }

    public function messages(): HasMany
    {
        return $this->hasMany(BotMessage::class, 'from_id');
    }
}
