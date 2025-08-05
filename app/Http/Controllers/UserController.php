<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       return view('user.dashboard');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'username'=>'required',
            'email'=>'required|unique:appuser|email',
            'contact'=>'required|unique:appuser',
            'password'=>'required|max:12|min:8'
        ]);
        $result =DB::table('appuser')->insert([
                    'username'=>$request->username,
                    'email' => $request->email,
                    'contact'=>$request->contact,
                    'password'=>$request->password,
                    'profile'=>''
            ]);
        if($result){
            return redirect()->route('user.index');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    /*
    Login form display
    */
    public function login()
    {
        return view('user.login');
    }

    // user session create using login

    public function createUserSession(Request $request)
    {
    
        $email = $request['email'];
        $pwd  =    $request['pwd'];
        $user = DB::table('appuser')->where(['email'=>$email,'password'=>$pwd])->first();
        
        if(isset($user)){
            echo "jhjhjkh";
             session()->put('user',$user);
            //  print_r(session('user'));
             return redirect('/user');
        }
        else{
            return redirect('/login')->with('msg','Invalid credential');
        }
    
    }

    public function logout(Request $request){
        if ($request->session()->exists('user')) {
            session()->flush();
             return redirect('/login');
        }
    }

}
