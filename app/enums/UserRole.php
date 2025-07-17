<?php

namespace App\Enums;

class UserRole {
    const ADMIN = 'admin';
    const USER = 'user';

    public static function all(): array
    {
        return [
            self::ADMIN,
            self::USER,
        ];
    }
}
