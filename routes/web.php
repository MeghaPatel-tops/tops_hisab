<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('user.master');
});

Route::resource('/user',UserController::class);

Route::get('/login',[UserController::class,'login'])->name('login');
Route::get('/logout',[UserController::class,'logout'])->name('logout');

Route::post('/usersession',[UserController::class,'createUserSession'])->name('usersession');

Route::get('/dashboard', function () {
    return view('user.dashboard');
});