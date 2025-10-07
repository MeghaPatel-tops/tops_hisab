<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Mail\VerificationMail;
use App\Http\Controllers\FriendController;
use App\Http\Controllers\TransactionController;



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


Route::middleware(['UserAuth'])->group(function(){
    Route::get('/', function () { return view('user.dashboard'); });
    
    
    Route::get('/friendlist',[FriendController::class,'friendList'])->name('friendList');
  
    Route::post('/addfriend',[FriendController::class,'addFriend'])->name('addFriend');

    Route::get('/acceptfriend/{id}',[FriendController::class,'acceptfriend'])->name('acceptfriend');

    Route::get('/declinefriend/{id}',[FriendController::class,'declinefriend'])->name('declinefriend');
     Route::get('/transaction',[TransactionController::class,'index'])->name('transaction');

});

  Route::get('/findfriend',[FriendController::class,'findFriend'])->name('findFriend');

