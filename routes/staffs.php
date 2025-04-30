<?php

declare(strict_types=1);

Route::controller(\App\Main\Staffs\Controllers\NurseController::class)
    ->prefix("nurses")
    ->as('nurses.')
    ->group(function () {
        Route::get("", 'index') ->name('index');
        Route::get("create", 'create') ->name('create');
        Route::post("store", 'store') ->name('store');

        Route::group(['prefix' => '{nurse}'], function () {
            Route::get("edit", 'edit') ->name('edit');
            Route::post("update", 'update') ->name('update');
            Route::delete("delete", 'delete') ->name('delete');
            Route::get("restore", 'restore') ->name('restore');
        });
    });

Route::controller(\App\Main\Staffs\Controllers\WorkerController::class)
    ->prefix("workers")
    ->as('workers.')
    ->group(function () {
        Route::get("", 'index') ->name('index');
        Route::get("create", 'create') ->name('create');
        Route::post("store", 'store') ->name('store');

        Route::group(['prefix' => '{nurse}'], function () {
            Route::get("edit", 'edit') ->name('edit');
            Route::post("update", 'update') ->name('update');
            Route::delete("delete", 'delete') ->name('delete');
            Route::get("restore", 'restore') ->name('restore');
        });
    });
