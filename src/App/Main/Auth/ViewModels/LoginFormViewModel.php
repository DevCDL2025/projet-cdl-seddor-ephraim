<?php

declare(strict_types=1);


namespace App\Main\Auth\ViewModels;

use Domain\Users\Data\AuthenticationData;
use Domain\Users\Enums\UsersEnum;
use Spatie\ViewModels\ViewModel;
use Support\Concerns\StaticallyInstanciable;

class LoginFormViewModel extends ViewModel
{
    use StaticallyInstanciable;

    public function formSchema(): array
    {
        return AuthenticationData::empty();
    }

    public function toArray() : array
    {
        return [
            "formSchema" => $this->formSchema(),
            "loginLinks" => UsersEnum::loginLinks()
        ];
    }
}
