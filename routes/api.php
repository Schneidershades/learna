<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {       
    Route::post('user/register', 'Api\User\UserController@register')->name('user-register');
    Route::post('user/login', 'Api\User\UserController@login')->name('user-login');
    Route::post('user/logout', 'Api\User\UserController@logout')->name('user-logout');
});