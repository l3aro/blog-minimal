<?php

namespace App\Enums;

final class PostStatusEnum extends Enum
{
    const DRAFT = 'draft';
    const PUBLISHED = 'published';
    const SCHEDULED = 'scheduled';

    public function __construct()
    {
        $this->items = [
            self::DRAFT => self::DRAFT,
            self::PUBLISHED => self::PUBLISHED,
            self::SCHEDULED => self::SCHEDULED,
        ];

        $this->labels = [
            self::DRAFT => __('Draft'),
            self::PUBLISHED => __('Published'),
            self::SCHEDULED => __('Scheduled'),
        ];
    }
}
