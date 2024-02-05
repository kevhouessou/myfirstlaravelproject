<?php

namespace App\Enumerations;
enum RoleEnum: string
{
    case ADMINISTRATOR = 'ADMINISTRATOR';
    case APPLICANT = 'APPLICANT';
    case EXAMINER = "EXAMINER";

    public static function values()
    {
        return [
            self::ADMINISTRATOR->value,
            self::APPLICANT->value,
            self::EXAMINER->value,
        ];
    }

}
