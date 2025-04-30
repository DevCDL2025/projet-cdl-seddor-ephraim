<?php

declare(strict_types=1);


namespace App\Main\Users\ViewModels;

use Domain\Agencies\Services\AgencyService;
use Domain\Permissions\Services\PermissionService;
use Domain\Users\Data\AdminData;
use Domain\Users\Models\Admin;
use Spatie\ViewModels\ViewModel;
use Support\Concerns\StaticallyInstanciable;

class AdminFormViewModel extends ViewModel
{
    use StaticallyInstanciable;

    public function __construct(
        public ?Admin $admin = null,
    )
    {}

    public function formSchema(): array|AdminData
    {
        return $this ->admin !== null
            ? AdminData::forForm($this->admin)
            : AdminData::empty([
                "id" => ""
            ]);
    }

    public static function roles(): array
    {
        return PermissionService::getRolesWithAttributes() ->toArray();
    }

    public function toArray(): array
    {
        return [
            "formSchema"    => $this ->formSchema(),
            "roles"         => self::roles(),
        ];
    }
}
