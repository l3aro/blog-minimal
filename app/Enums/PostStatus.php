<?php

namespace App\Enums;

final class PostStatus extends Enum
{
    const DRAFT = 'draft';
    const PUBLISHED = 'published';

    public function __construct()
    {
        $this->items = [
            self::DRAFT => self::DRAFT,
            self::PUBLISHED => self::PUBLISHED,
        ];

        $this->labels = [
            self::DRAFT => __('Draft'),
            self::PUBLISHED => __('Published'),
        ];
    }
}
