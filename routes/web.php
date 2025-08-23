<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Mail\VerificationMail;
use App\Http\Controllers\FriendController;


Route::get('/', function () {
    return view('user.dashboard');
});

Route::resource('/user',UserController::class);

Route::get('/login',[UserController::class,'login'])->name('login');
Route::get('/logout',[UserController::class,'logout'])->name('logout');

Route::post('/usersession',[UserController::class,'createUserSession'])->name('usersession');

// Route::get('/dashboard', function () {
//     return view('user.dashboard');
// });

// Route::get('/mail',function(){
//     Mail::to('meghapatel1.tops@gmail.com')->send(new VerificationMail('meghapatel1.tops@gmail.com'));
// });

Route::post('/verifymail',[UserController::class,'verifyEmailByOtp']);

Route::get('/friendlist',[FriendController::class,'friendList'])->name('friendList');
