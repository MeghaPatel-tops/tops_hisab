<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('user.master');
});

Route::get('/login', function () {
    return view('user.login');
});