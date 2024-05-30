<?php

namespace App\Http\Controllers\auth;

use App\Models\kyc;
use App\Models\User;
use App\Models\Account;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    //
    public function index()
    {
        return view("auth.login");
    }

    public function login(Request $req)
    {
        //
        $validate = $req->validate([
            'email'=> "required|string|email",
            'password'=> "required"
        ]);

        if(Auth::attempt($validate, $req->input("rememberme"))){

            $row = Auth::authenticate();
        
            if($row->email_verified_at && $row->is_verified == 1)
            {
                if($row->is_admin)
                {                    
                    $req->session()->put("USER",$row);
                    return redirect()->route("admin.dashboard");
                }

                $req->session()->put("USER",$row);

                $account = Account::where('user_id', $row->id)->first();
    
                if (is_null($account)) {
                    return redirect()->route('customer.account.create');
                }
    
                $kyc = kyc::where('user_id', $row->id)->first();
    
                if (is_null($kyc)) {
                    return redirect()->route('customer.kyc.index');
                }
    
                return redirect()->route('customer.dashboard');
                
            }
            
            return back()->withErrors(['email'=>'You must verify your email to access this service']);
            
        }
        return back()->withErrors(['email'=>'Wrong login details']);
    }
}
