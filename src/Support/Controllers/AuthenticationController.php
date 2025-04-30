<?php

declare(strict_types=1);


namespace Support\Controllers;

use Domain\Users\Actions\AuthenticateUser;
use Domain\Users\Data\AuthenticationData;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Support\Contracts\GuardResolverContract;
use Support\Controllers\BaseController;

abstract class AuthenticationController extends BaseController implements GuardResolverContract
{
    /**
     * @return string
     */
    abstract protected function whereToRedirectAfterLogin(): string;

    /**
     * @return RedirectResponse
     */
    abstract protected function whereToRedirectAfterLogout(): RedirectResponse;

    /**
     * Return Authentication form
     */
    abstract public function displayForm();

    /**
     * Handle login request.
     * @throws ValidationException
     */
    public function handle(AuthenticationData $data, AuthenticateUser $authenticateUser): RedirectResponse
    {
        $authenticateUser ->execute($data, $this ->guard());

        request() ->session() ->regenerate();

        flash_success(__('messages.auth.login_success'));

        return redirect() ->intended($this -> whereToRedirectAfterLogin());
    }

    /**
     * Destroy user login session
     */
    public function destroy(Request $request): RedirectResponse
    {
        auth() ->guard($this ->guard())->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        flash_success(__('messages.auth.logout_success'));

        return $this ->whereToRedirectAfterLogout();
    }
}
