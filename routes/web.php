<?php

use App\Main\Account\Controllers\ProfileController;
use App\Main\Auth\Controllers\LoginController;
use App\Main\Dashboard\Controllers\DashboardController;
use App\Main\Employees\Controllers\EmployeeController;
use App\Main\IdentityDocuments\Controllers\IdentityDocumentController;
use App\Main\Permissions\Controllers\PermissionController;
use App\Main\Permissions\Controllers\RoleController;
use App\Main\Uploads\Controllers\UploadsController;
use App\Main\Users\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::forLocalizedApp(function () {
    Route::group(['as' =>'auth.', 'controller' => LoginController::class], function () {
        Route::get('/', 'displayForm')->name('login');
        Route::post('/login', 'handle') ->name('login.submit');
    });

    Route::forAuthenticatedAdmin(function () {
        Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.'], function () {
            Route::get('/', DashboardController::class)->name('global');
        });

        Route::get("logout", [LoginController::class, 'destroy']) ->name('auth.logout');

        Route::group(['as' => 'account.'], function () {
            Route::group(['controller' => ProfileController::class], function () {
                Route::group(['prefix' =>'infos-profil'], function () {
                    Route::get("/", 'showProfile')->name('profile');
                    Route::post('/update', 'updateProfile')->name('profile.update');
                });

                Route::group(['prefix' =>'changer-mot-de-passe'], function () {
                    Route::get("/", 'changePassword') ->name('change-password');
                    Route::post('/submit', 'updatePassword')->name('change-password.submit');
                });
            });
        });

        Route::controller(AdminController::class)
            ->prefix("users")
            ->as('users.')
            ->group(function () {
                Route::get("", 'index') ->name('index');
                Route::get("create", 'create') ->name('create');
                Route::post("store", 'store') ->name('store');

                Route::group(['prefix' => '{admin}'], function () {
                    Route::get("show", 'show') ->name('show');
                    Route::get("edit", 'edit') ->name('edit');
                    Route::post("update", 'update') ->name('update');
                    Route::delete("delete", 'delete') ->name('delete');
                    Route::get("restore", 'restore') ->name('restore');
                    Route::delete("force-delete", 'forceDelete') ->name('force-delete');
                });
            });

        Route::controller(\App\Main\Specialities\Controllers\SpecialityController::class)
            ->prefix("specialities")
            ->as('specialities.')
            ->group(function () {
                Route::get("", 'index') ->name('index');
                Route::post("store", 'store') ->name('store');

                Route::group(['prefix' => '{speciality}'], function () {
                    Route::post("update", 'update') ->name('update');
                    Route::delete("delete", 'delete') ->name('delete');
                    Route::get("restore", 'restore') ->name('restore');
                });
            });

        require __DIR__.'/settings.php';
        require __DIR__.'/departments.php';
        require __DIR__.'/doctors.php';
        require __DIR__.'/staffs.php';
        require __DIR__.'/permissions.php';
    });
});


Route::post('process', [UploadsController::class, 'process']) ->name('upload.process');
Route::post('revert', [UploadsController::class, 'revert']) ->name('upload.revert');

