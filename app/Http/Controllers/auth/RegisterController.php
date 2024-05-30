<?php

namespace App\Http\Controllers\auth;

use Carbon\Carbon;
use App\libs\Purple;
use App\Models\User;
use App\Events\Auth\Register;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Notifications\VerifyNewUser;
use Illuminate\Support\Facades\Hash;
use function PHPUnit\Framework\never;
use App\Notifications\welcomeNewCustomer;

class RegisterController extends Controller
{
    //
    public function index()
    {
        //
        return view("auth.register");
    }

    public function save(Request $req)
    {
        $req->validate([
            'firstname' => "required|string|max:255",
            'lastname' => "required|string|max:255",
            'username' => "required|string|max:255",
            'email' => "required|string|unique:users,email",
            'password' => "required|max:8",
        ]);

        $otp = rand(1000,9999);

        $user = User::where('email', '=', $req->email)->first();
        if($user)
        {
            //
            if($user->is_verified == 1)
            {
                return back()->withErrors(['email'=>'Email already exists']);
            }

        }
        else 
        {

            $save = User::insert([
                'firstname' => $req->input("firstname"),
                'lastname' => $req->input("lastname"),
                'username' => $req->input("username"),
                'email' => $req->input("email"),
                "user_uuid" =>  Str::uuid(),
                'password' => Hash::make($req->input("password")),
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
                // 'otp' => rand(1000,9999) 
            ]);

            if($save)
            {
                $customer = User::where('email', '=', $req->email)->first();

                Register::dispatch($customer);

                return redirect("/auth/login")->with("success", "Registration Successful");
            }

            return back()->withErrors("error", "Something went wrong!");
        }

        
        
        return view("auth.register");
    }
}
