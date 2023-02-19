<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Manage\UsersController;
use App\Http\Controllers\Messages\ChatsController;
use LionRoute\Route;

/**
 * ------------------------------------------------------------------------------
 * Web Routes
 * ------------------------------------------------------------------------------
 * Here is where you can register web routes for your application
 * ------------------------------------------------------------------------------
 **/

Route::prefix('api', function() {
    Route::prefix('auth', function() {
        Route::post('login', [LoginController::class, 'auth']);
    });

    Route::middleware(['jwt-authorize'], function() {
        Route::prefix('users', function() {
            Route::get('read', [UsersController::class, 'readUsers']);
        });

        Route::prefix('messages', function() {
            Route::post('send', [ChatsController::class, 'createMessages']);
            Route::post('read', [ChatsController::class, 'readMessages']);
        });
    });
});