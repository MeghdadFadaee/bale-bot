<?php

namespace App\Models\Bot;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
    protected $primaryKey = 'file_id';
    public $incrementing = false;

    public function messages(): HasMany
    {
        return $this->hasMany(BotMessage::class);
    }
}
