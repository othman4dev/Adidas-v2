<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Session;
class AuthController extends Controller
{
    public function login(){
        return view("Auth.login");
    }
    public function Register(){
        return view("Auth.register");
    }
    public function ForgetPassword(){
        return view("Auth.reset");
    }
    public function User_Register(Request $request){
        $validateData = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required',
        ]);
        $user = new User();
        $user->name = $validateData['name'];
        $user->email = $validateData['email'];
        $user->password = Hash::make($validateData['password']); 
        $user->credit_card = ""; 
        $user->address = ""; 
        $user->role_id  = 2; 
        $user->save();
        return redirect('/login');   
    }
    public function User_Login(Request $request){
        $validateData = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $user = User::where('email',$validateData['email'])->first();
        if($user != null){
            $hashedPasswordDB = $user->password;
            if (Hash::check($validateData['password'], $hashedPasswordDB)) {
                session(['username' =>$user->name]);
                session(['email' =>$user->email]);
                session(['user_id' =>$user->id]);
                session(['user_role' =>$user->role_id]);
                if($user->role_id==1) return redirect('/Home');
                if($user->role_id==2) return redirect('/Home/User');
            } else {
                return redirect('/login'); 
            }
        }else return redirect('/login'); 
    }
    public function logout(){
        Session::flush();
        return redirect('/'); 
    }
}
