<?php

namespace App\Enums;

use Illuminate\Support\Arr;

trait EnumHelpers
{
    public static function options(): array
    {
        return Arr::map(self::cases(), fn(self $case) => $case->value);
    }

    public static function translates(): array
    {
        return Arr::map(self::cases(), fn(self $case) => $case->trans());
    }

    public function trans(): string
    {
        return trans($this->value);
    }
}
