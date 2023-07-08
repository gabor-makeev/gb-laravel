<?php

namespace App\Enums;

enum NewsStatus: string
{
    case DRAFT = 'draft';
    case PUBLISHED = 'published';

    public static function all(): array
    {
        return [
            self::DRAFT->value,
            self::PUBLISHED->value
        ];
    }
}
