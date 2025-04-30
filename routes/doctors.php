<?php

declare(strict_types=1);

Route::controller(\App\Main\Doctors\Controllers\DoctorController::class)
    ->prefix("doctors")
    ->as('doctors.')
    ->group(function () {
        Route::get("", 'index') ->name('index');
        Route::get("create", 'create') ->name('create');
        Route::post("store", 'store') ->name('store');

        Route::group(['prefix' => '{doctor}'], function () {
            Route::get("show", 'show') ->name('show');
            Route::get("edit", 'edit') ->name('edit');
            Route::post("update", 'update') ->name('update');
            Route::delete("delete", 'delete') ->name('delete');
            Route::get("restore", 'restore') ->name('restore');
        });
    });
