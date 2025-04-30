<?php

declare(strict_types=1);


namespace Domain\Users\Models;

use Domain\Permissions\Traits\HasRolesManager;
use Domain\Users\Traits\HasUserAccount;

class Admin extends User
{
    use HasUserAccount, HasRolesManager;

    protected $table = 'admins';
}
