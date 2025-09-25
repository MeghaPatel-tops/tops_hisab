<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use  App\Exceptions;

use Illuminate\Http\Request;

class FriendController extends Controller
{
    public function friendList()
    {

      return view('user.friendlist');
    }

    public function findFriend(Request $request)
    {
      try{
        $searchData= $request->phone;
        $friendFound = DB::table('appuser')->where('contact',$searchData)->orWhere('email',$searchData)->first();
        
        echo json_encode($friendFound);
      }catch(Exceptions $err){

        echo json_encode($err);
      }

    }

    public function addFriend(Request $request){
        print_r($request->all());
    }
}
