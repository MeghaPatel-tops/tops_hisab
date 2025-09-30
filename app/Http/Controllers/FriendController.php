<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use  App\Exceptions;

use Illuminate\Http\Request;

class FriendController extends Controller
{
    public function friendList()
    {
      $sessionUser =session('user');
      $WaitingApprovalFriend = DB::table('friend_list')
          ->join('appuser','friend_list.friendid',"=","appuser.uid")
          ->where([
            'userid'=>$sessionUser->uid,
            'status'=>"pending"
          ])->get();

      // echo "<pre>";
      // print_r($WaitingApprovalFriend);
      // exit;
      
      $pendingFriend = DB::table('friend_list')
          ->join('appuser','friend_list.userid',"=","appuser.uid")
          ->where([
            'friendid'=>$sessionUser->uid,
            'status'=>"pending"
          ])->get();
          
      $approvedFriend = DB::table('friend_list')
          ->join('appuser','friend_list.friendid',"=","appuser.uid")
          ->where([
            'userid'=>$sessionUser->uid,
            'status'=>"approved"
          ])->get();
      
      return view('user.friendlist',['pendinglist'=>$pendingFriend,"approvedlist"=>$approvedFriend,'WaitingApprovalFriend'=>$WaitingApprovalFriend]);
    }

    public function findFriend(Request $request)
    {
      try{
         $sessionUser =session('user');
        $searchData= $request->phone;
       
        
        $friendFound = DB::table('appuser')->where('contact',$searchData)->orWhere('email',$searchData)->first();
        $preAddFriend = DB::table('friend_list')->where([
          'userid'=>$sessionUser->uid,
          'friendid'=>$friendFound->uid,
        ])->first();
       
        if(isset($preAddFriend) && $preAddFriend !=[]){
          echo json_encode(['msg'=>"Friend Already Added"]);
        }
        else{
          echo json_encode($friendFound);
        }
         
      
       
        
      }catch(Exceptions $err){

        echo json_encode($err);
      }

    }

    public function addFriend(Request $request){
      

      $sessionUser =session('user'); 
     
        $result = DB::table('friend_list')->insert([
          'userid'=>$sessionUser->uid,
          'friendid'=>$request->friendId,
          'status'=>'pending'
        ]);
        return redirect('/friendlist');
    }



    function acceptfriend(Request $request){
        $friends=DB::table('friend_list')->where('id',$request->id)->first();
        print_r($friends);
        
        $updateData = DB::table('friend_list')->where('id',$request->id)->update([
             'status'=>'approved'
        ]);

        $insertData = DB::table('friend_list')->insert([
            'userid'=>$friends->friendid,
            'friendid'=>$friends->userid,
            'status'=>"approved"
        ]);
        return redirect('/friendlist');
    }

    function declinefriend(Request $request){
        $friends=DB::table('friend_list')->where('id',$request->id)->delete();
        
        return redirect('/friendlist');
    }
}
