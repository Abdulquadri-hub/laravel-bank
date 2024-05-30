<?php

namespace App\Http\Controllers\customer;

use App\Models\User;
use App\Models\Account;
use App\Models\Transaction;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class TransferController extends Controller
{
    //
    public function index()
    {
        $account = User::find(Auth::user()->id)->account()->first();

        return view("customer.transfer.transfer",[
            
        ]);
    }

    public function internalTransfer(Request $req)
    {
        //
        $mode = "purple-bank";

        $req->validate([

            "dest_accountnumber" => "required|numeric|min:10",
            "amount" => "required|numeric|min:0.01",
            "description" => "required|string",
            "transaction_pin" => "required|numeric|min:4",
        ]);


        $account = User::find(Auth::user()->id)->account()->first();

        if(!empty($account))
        {
            $purple_user = Account::where("account_number", $req->dest_accountnumber)->with("user")->first();

            if(!is_null($purple_user))
            {
                if($account->account_balance > $req->amount)
                {
                    if(Hash::check($req->transaction_pin, $account?->transaction_pin))
                    {
                        
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
                            $purple_user->increment('account_balance', $req->amount);
                            return back()->with("success", "Deposit Successful");
                        }
    
                    }else{
                    
                        return back()->withErrors("transaction_pin", "Invalid Pin");
                    }
    
                }else{
                    
                    return back()->withErrors("error", "Insufficient balance");
                }

            }else{
                    
                return back()->withErrors("error", "Invalid purple account");
            }

        }else{
                    
            return back()->withErrors("error", "Invalid account");
        }

        return view("customer.transfer.transfer",[
            "mode" => $mode
        ]);
    }

    public function externalTransfer()
    {
        //
    }
}
