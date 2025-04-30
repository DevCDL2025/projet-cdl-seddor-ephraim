<?php

declare(strict_types=1);

Route::controller(\App\Main\Departments\Controllers\DepartmentTypeController::class)
    ->prefix("department-types")
    ->as('department-types.')
    ->group(function () {
        Route::get("", 'index') ->name('index');
        Route::post("store", 'store') ->name('store');

        Route::group(['prefix' => '{departmentType}'], function () {
            Route::post("update", 'update') ->name('update');
            Route::delete("delete", 'delete') ->name('delete');
            Route::get("restore", 'restore') ->name('restore');
        });
    });

Route::controller(\App\Main\Departments\Controllers\DepartmentController::class)
    ->prefix("departments")
    ->as('departments.')
    ->group(function () {
        Route::get("", 'index') ->name('index');
        Route::get("create", 'create') ->name('create');
        Route::post("store", 'store') ->name('store');

        Route::group(['prefix' => '{department}'], function () {
            Route::get("edit", 'edit') ->name('edit');
            Route::post("update", 'update') ->name('update');
            Route::delete("delete", 'delete') ->name('delete');
            Route::get("restore", 'restore') ->name('restore');
        });
    });
