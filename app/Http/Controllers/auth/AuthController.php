<?php

namespace App\Http\Controllers\auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{

    public function register(Request $req)
    {
        
        if($req->method() == "POST")
        {
            
            $req->validate([
                'firstname' => "required|string|max:255",
                'lastname' => "required|string|max:255",
                'username' => "required|string|max:255",
                'email' => "required|string|unique:users,email",
                'password' => "required|max:8",
            ]);

            
            $user = User::where('email', '=', $req->email)->first();
            if($user)
            {
                //
                if($user->is_verified == 1)
                {
                    return back()->withErrors(['email'=>'Email already exists']);
                }
    
            }else {
    
                $save = User::create([
                    'firstname' => $req->input("firstname"),
                    'lastname' => $req->input("lastname"),
                    'username' => $req->input("username"),
                    'email' => $req->input("email"),
                    'password' => bcrypt($req->input("password")),
                    'otp' => rand(1000,9999)
                ]);
    
                if($save)
                    return redirect("/auth/login")->with("success", "Registration Successful");
                else
                    return back()->withErrors("error", "Something went wrong!");
            }
    
        }
        
        return view("auth.register");
    }

    public function login()
    {
        //
        return view("auth.login");
    }

    public function googleLogin()
    {
        //
        return view("auth.googlelogin");
    }

    public function logout()
    {
        //
    }

    public function forgetPassword()
    {
        //
    }

    public function emailVerification()
    {
        //
    }
}
