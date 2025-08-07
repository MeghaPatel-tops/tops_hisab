<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Mail\VerificationMail;

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

Route::get('/mail',function(){
    Mail::to('meghapatel1.tops@gmail.com')->send(new VerificationMail());
});