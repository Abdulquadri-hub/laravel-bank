<?php

namespace App\Http\Controllers\customer;

use App\Models\User;
use App\Models\Transaction;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DepositController extends Controller
{
    //
    public function index()
    {
        
        return view("customer.deposit.deposit");
    }

    public function save(Request $req)
    {
        $req->validate([

            "amount" => "required|numeric|min:0.01",
            "description" => "required|string",
            "transaction_pin" => "required|numeric|min:4",
        ]);


        $account = User::find(Auth::user()->id)->account()->first();

        if(!empty($account))
        {
            if(Hash::check($req->transaction_pin, $account?->transaction_pin))
            {

                // "deposit_uuid",
                // "account_id",
                // "amount",
                // "status",
                // "completed_at",
                // "reference",
                // "description",
                
                $save = Transaction::create([
                    "user_id" => $account->user_id,
                    "transaction_type"  => "deposit",
                    "amount" => $req->amount,
                    "description" => $req->description,
                    "request_id" =>  Str::uuid(),
                    "reference"  => Str::uuid(),
                    "status"  => 'success'
                ]);

                if($save)
                {
                    $account->increment('account_balance', $req->amount);
                    return back()->with("success", "Deposit Successful");
                }

            }else{

                return back()->withErrors("transaction_pin", "Invalid Pin");
            }

        }else{

            return back()->withErrors("error", "Account don't exists");
        }

        return view("customer.deposit.deposit",[]);
    }
}
