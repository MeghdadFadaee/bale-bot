<?php

namespace App\Models\Bot;

use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property string $file_id
 * @property string $file_unique_id
 * @property int $width
 * @property int $height
 * @property int $file_size
 * @property Collection<BotMessage> $messages
 */
class BotPhotoSize extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'file_id',
        'file_unique_id',
        'width',
        'height',
        'file_size'
    ];

    public function messages(): HasMany
    {
        return $this->hasMany(BotMessage::class);
    }
}
