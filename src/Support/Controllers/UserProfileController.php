<?php

declare(strict_types=1);


namespace Support\Controllers;

use Domain\Users\Actions\UpdateUserPassword;
use Domain\Users\Actions\UpdateUserProfileInformation;
use Domain\Users\Data\ChangePasswordData;
use Domain\Users\Data\UpdateUserProfileData;
use Domain\Users\UsersManager;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Support\Contracts\GuardResolverContract;

abstract class UserProfileController extends BaseController implements GuardResolverContract
{
    /**
     * Get show profile view.
     *
     * @return string|null
     */
    abstract protected static function getShowProfileView(): ?string;

    /**
     * Get change password view.
     *
     * @return string|null
     */
    abstract protected static function getChangePasswordView(): ?string;

    public function showProfile()
    {
        return inertia(static::getShowProfileView(), [
            "viewElements"  => static::getViewElementsFor("profile.details"),
            "formSchema" => UsersManager::getAuthUserProfile($this ->guard())
        ]);
    }

    public function updateProfile(UpdateUserProfileData $data, UpdateUserProfileInformation $action): \Illuminate\Http\RedirectResponse
    {
        $user = $action ->execute($data, UsersManager::getAuthUserModel($this ->guard()));

        auth()->guard($this->guard())->login($user);

        flash_success(__('messages.account.profile_updated'));

        return back();
    }

    public function changePassword()
    {
        return inertia(static::getChangePasswordView(), [
            "viewElements"  => static::getViewElementsFor("profile.change-password"),
            "formSchema" => ChangePasswordData::empty()
        ]);
    }

    /**
     * @throws ValidationException
     */
    public function updatePassword(ChangePasswordData $data): \Illuminate\Http\RedirectResponse
    {
        $user = UsersManager::getAuthUserModel($this ->guard());

        if (!Hash::check($data ->current_password, $user ->password)) {
            throw ValidationException::withMessages([
                'current_password' => __('messages.provided_credentials_do_not_match_records')
            ]);
        }

        UpdateUserPassword::execute($user, $data ->new_password);

        flash_success(__('messages.account.password_updated'));

        return back();
    }
}
