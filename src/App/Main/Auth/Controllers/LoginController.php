<?php

declare(strict_types=1);


namespace App\Main\Auth\Controllers;

use App\Main\Auth\ViewModels\LoginFormViewModel;
use Domain\Shared\Enums\GuardsEnum;
use Illuminate\Http\RedirectResponse;
use Support\Controllers\AuthenticationController;

class LoginController extends AuthenticationController
{

    /**
     * @inheritDoc
     */
    protected function whereToRedirectAfterLogin(): string
    {
        return app_route('dashboard.global');
    }

    /**
     * @inheritDoc
     */
    protected function whereToRedirectAfterLogout(): RedirectResponse
    {
        return to_app_route('auth.login');
    }

    /**
     * @inheritDoc
     */
    public function guard(): string
    {
        return GuardsEnum::ADMIN ->value;
    }

    /**
     * @inheritDoc
     */
    public function displayForm()
    {
        return inertia("Auth/Login", [
            "viewElements" => static::getViewElementsFor('auth.login'),
            "viewModel"    => LoginFormViewModel::make()->toArray()
        ]);
    }
}
