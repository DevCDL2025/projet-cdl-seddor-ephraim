<?php

declare(strict_types=1);


namespace Domain\Shared\Enums;

use Illuminate\Support\Str;
use Support\Concerns\Enums\EnumEnhancements;
use Support\Contracts\EnumsDefinition;

enum ResourcesEnum: string
{
    use EnumEnhancements;

    case PERMISSION        = 'permission';
    case ROLE              = 'role';
    case USER              = 'user';
    case ADMIN             = 'admin';
    case IDENTITY_DOCUMENT = 'identity-document';
    case SPECIALITY        = 'speciality';
    case DEPARTMENT_TYPE   = 'department-type';
    case DEPARTMENT        = 'department';
    case POSITION          = 'position';
    case STAFF             = 'staff';
    case DOCTOR            = 'doctor';
    case SCHEDULE          = 'schedule';
    case NURSE             = 'nurse';
    case WORKER            = 'worker';


    public function plural(): string
    {
        return Str::plural($this->value);
    }

    public function locale($number = 1): string
    {
        return trans_choice('displays.resource.' . $this->value, $number);
    }
}
