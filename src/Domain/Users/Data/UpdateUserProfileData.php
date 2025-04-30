<?php

declare(strict_types=1);


namespace Domain\Users\Data;

use Domain\Users\Data\SharedUserData;
use Support\Concerns\Rules\EmailValidationRules;

class UpdateUserProfileData extends SharedUserData
{
    use EmailValidationRules;


}
