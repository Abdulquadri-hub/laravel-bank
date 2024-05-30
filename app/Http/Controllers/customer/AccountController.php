<?php

namespace App\Http\Controllers\customer;

use Carbon\Carbon;
use App\libs\Purple;
use App\Models\User;
use App\Models\Account;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Events\Account\UpadtePassword;

class AccountController extends Controller
{
    public function index()
    {
        $user = User::find(Auth::user()->id);
        $account = $user->account()->first();

        $mode = "";

        return view("customer.account.account", [
            'account' => $account,
            'mode' => $mode
        ]);
        
    }


    public function create(Request $req)
    {

        $user = User::find(Auth::user()->id);

        if($req->method() == "POST")
        {

            $data = $req->validate([
                'firstname' => "required|string|max:255",
                'lastname' => "required|string|max:255",
                'email' => "required|string",
                'gender' => "required|string",
                'home_address' => "required|string",
                'state' => "required|string",
                'office_address' => "required|string",
                'city' => "required|string",
                'bvn' => "required|numeric|min:11|required|numeric|unique:accounts,bvn",
                'transaction_pin' => "required|numeric|min:4",
                'date_of_birth' => "required|date|before_or_equal:18 years ago",
                'phone_num' => "required",
            ]);

            
            unset($data['transaction_pin'], $data['bvn']);
            $user->update($data);

            $account = Account::where('user_id', $user->id)->first();
        
            if (is_null($account)) {

                $account = new Account([
                    'user_id' => $user->id,
                    'bvn' => $req->bvn,
                    'transaction_pin' => Hash::make($req->transaction_pin),
                    'account_uuid' => Str::uuid(),
                    'account_number' => Purple::generateAccountNumber(),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

            } else {
                $account->updated_at = now();
                $account->bvn  =  $req->bvn;
                $account->transaction_pin  = Hash::make($req->transaction_pin);
            }
        
            $save = $account->save();

    
            if($save)
            {
                //notify admin
                //notify customer for successful account creation
                return redirect()->route("customer.kyc.index")->with("success", "Account Created successfully Successful");
            }

            return back()->withErrors("error", "Something went wrong!");
        }

        return view("customer.account.create", [
            "user" => $user
        ]);
    }

    public function overview()
    {
        $user = User::find(Auth::user()->id);
        $account = $user->account()->first();

        $mode = "overview";

        return view("customer.account.account", [
            'account' => $account,
            'mode' => $mode
        ]);
        
    }

    public function edit(Request $req)
    {

        $user = User::find(Auth::user()->id);
        $account = $user->account()->first();

        $mode = "edit";

        $user = User::find(Auth::user()->id);

        if($req->method() == "POST")
        {

            $data = $req->validate([
                'email' => "required|string",
                'home_address' => "required|string",
                'phone_num' => "required",
            ]);

            $save = $user->update($data);
    
            if($save)
            {
                //notify admin for account update
                return back()->with("success", "Account Updated!");
            }

            return back()->withErrors("error", "Something went wrong!");
        }

        return view("customer.account.account", [
            'account' => $account,
            'mode' => $mode
        ]);
    }

    public function changePassword(Request $req)
    {

        $user = User::find(Auth::user()->id);
        $account = $user->account()->first();

        $mode = "change-password";

        if($req->method() == "POST")
        {
            $req->validate([
                'password' => "required|min:8",
                'newpassword' => "required|min:8",
                'renewpassword' => "required|min:8|same:newpassword",
            ]);

            $validPassword =  Hash::check($req->password, $user->password); 
            if($validPassword)
            {
                $user->password = Hash::make($req->newpassword);
                $user->save();

                $to = User::find(Auth::user()->id);

                UpadtePassword::dispatch($to);

                return back()->with("success", "Password Updated!");

            }                

            return back()->withErrors("password", "Invalid password!");

        }

        return view("customer.account.account", [
            'account' => $account,
            'mode' => $mode
        ]);
    }

    // public function changePin(Request $req)
    // {

    //     $user = User::find(Auth::user()->id);
    //     $account = $user->account()->first();

    //     $mode = "change-password";

    //     if($req->method() == "POST")
    //     {
    //         $req->validate([
    //             'password' => "required|min:8",
    //             'newpassword' => "required|min:8",
    //             'renewpassword' => "required|min:8|same:newpassword",
    //         ]);

    //         $validPassword =  Hash::check($req->password, $user->password); 
    //         if($validPassword)
    //         {
    //             $user->password = Hash::make($req->newpassword);
    //             $user->save();

    //             $to = User::find(Auth::user()->id);

    //             UpadtePassword::dispatch($to);

    //             return back()->with("success", "Password Updated!");

    //         }                

    //         return back()->withErrors("password", "Invalid password!");

    //     }

    //     return view("customer.account.account", [
    //         'account' => $account,
    //         'mode' => $mode
    //     ]);
    // }
}
