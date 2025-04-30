<?php

declare(strict_types=1);

use App\Main\IdentityDocuments\Controllers\IdentityDocumentController;

Route::controller(IdentityDocumentController::class)
    ->prefix("identity-documents")
    ->as('identity-documents.')
    ->group(function () {
        Route::get("", 'index') ->name('index');
        Route::post("store", 'store') ->name('store');

        Route::group(['prefix' => '{identityDocument}'], function () {
            Route::post("update", 'update') ->name('update');
        });
    });

Route::controller(\App\Main\Positions\Controllers\PositionController::class)
    ->prefix("positions")
    ->as('positions.')
    ->group(function () {
        Route::get("", 'index') ->name('index');
        Route::post("store", 'store') ->name('store');

        Route::group(['prefix' => '{position}'], function () {
            Route::post("update", 'update') ->name('update');
        });
    });
