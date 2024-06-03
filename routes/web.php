<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

// Auth::routes();

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
