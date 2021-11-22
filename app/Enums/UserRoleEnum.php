<?php

namespace App\Enums;

final class UserRoleEnum extends Enum
{
    public const ADMIN = 1;
    public const USER = 0;

    public function __construct()
    {
        $this->items = [
            self::ADMIN => self::ADMIN,
            self::USER => self::USER,
        ];

        $this->labels = [
            self::ADMIN => __('Admin'),
            self::USER => __('User'),
        ];
    }
}
