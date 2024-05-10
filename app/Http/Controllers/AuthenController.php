<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Authentication;
class AuthenController extends Controller
{
    public function registration()
    {
        return view('register');
    }
    public function registerUser(Request $request)
    {
        $request->validate([
            'username'=>'required',
            'name'=>'required',
            'password'=>'required'
        ]);
        $user = Authentication::where('username','=',$request->username)->first();
        if(!$user){
            $user = new Authentication();
            $user->username = $request->username;
            $user->name = $request->name;
            $user->password = $request->password;
            $user->permission = 0;
            $result = $user->save();
            if($result){
                return back()->with('success','You have registered successfully.');
            } else {
                return back()->with('fail','Something wrong!');
            }
        }else{
            return back()->with('fail','มี Username นี้ในระบบแล้ว!');
        }
       
    }
    ////Login
    public function login()
    {
        return view('login');
    }

    
    public function loginUser(Request $request)
    {
        $request->validate([            
            'username'=>'required|',
            'password'=>'required'
        ]);

        $user = Authentication::where('username','=',$request->username)->first();
        if($user){  // เข้ารหัส check ทั้งฝั่ง ที่ request และ ดึงจากฐานข้อมูล
            if(Hash::check($request->password, $user->password)){
                $request->session()->put('loginId', $user->id);
                $request->session()->put('permission', $user->permission);
                return view('home');
            } else {
                return back()->with('fail','Password not match!');
            }
        } else {
            return back()->with('fail','This username is not register.');
        }        
    }
    //// Dashboard
    public function dashboard()
    {
        // return "Welcome to your dashabord.";
        $data = array();
        if(Session::has('loginId')){
            $data = User::where('id','=',Session::get('loginId'))->first();
        }
        return view('dashboard',compact('data'));
    }
    ///Logout
    public function logout()
    {
         
        $data = array();
        if(Session::has('loginId')){
            Session::flush();
            Session::pull('loginId');
            return redirect('login');
        }
    }
}