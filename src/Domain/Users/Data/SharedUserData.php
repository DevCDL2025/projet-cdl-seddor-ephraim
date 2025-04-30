<?php

declare(strict_types=1);


namespace Domain\Users\Data;

use Spatie\LaravelData\Data;

class SharedUserData extends Data
{
    public string|int|null $id;
    public ?string         $full_name;
    public ?string         $last_name;
    public string          $first_name;
    public string          $email;
    public ?string         $phone_number;
    public ?string         $username;
    public ?string         $password = null;
}
