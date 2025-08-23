<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FriendController extends Controller
{
    public function friendList()
    {
       return view('user.friendlist');
    }

    public function findFriend()
    {

    }
}
