<?php

declare(strict_types=1);

use App\Main\Permissions\Controllers\PermissionController;
use App\Main\Permissions\Controllers\RoleController;

Route::controller(RoleController::class)
    ->prefix("roles")
    ->as('roles.')
    ->group(function () {
        Route::get("", 'index') ->name('index');
        Route::get("create", 'create') ->name('create');
        Route::post("store", 'store') ->name('store');

        Route::group(['prefix' => '{role}'], function () {
            Route::get("edit", 'edit') ->name('edit');
            Route::post("update", 'update') ->name('update');
            Route::delete("delete", 'delete') ->name('delete');
            Route::get("restore", 'restore') ->name('restore');
            Route::delete("force-delete", 'forceDelete') ->name('force-delete');
        });
    });

Route::controller(PermissionController::class)
    ->prefix("permissions")
    ->as('permissions.')
    ->group(function () {
        Route::get("", 'index') ->name('index');
        Route::post("store", 'store') ->name('store');

        Route::group(['prefix' => '{permission}'], function () {
            Route::post("edit", 'edit') ->name('edit');
            Route::post("update", 'update') ->name('update');
        });
    });
