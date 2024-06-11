<?php

namespace App\Http\Controllers\customer;

use App\Models\User;
use App\Models\Deposit;
use App\Models\Transaction;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
                $deposit = Deposit::create([
                    "deposit_uuid" => Str::uuid(),
                    'account_id' => $account->id,
                    'amount' => $req->amount,
                    'status' => 'pending',
                    'reference' => 'PUR-' . uniqid(),
                    'description' => $req->description,
                ]);

                try 
                {
                    $account->increment('account_balance', $req->amount);

                    $deposit->status = 'completed';
                    $deposit->completed_at = now();
                    $deposit->save();

                    $transaction = Transaction::create([
                        "transaction_uuid" => Str::uuid(),
                        "account_id" => $account->id,
                        "deposit_id" => $deposit->id,
                        "transaction_type"  => "credit",
                        "amount" => $req->amount,
                        "balance_after" => $account->account_balance,
                        "description" => $req->description,
                    ]);
    
                    if($transaction)
                    {
                        return back()->with("success", "Deposit Successful");
                    }

                }catch(\Throwable $th) {
                    
                    $deposit->status = 'failed';
                    $deposit->save();

                    return back()->with("error", "Deposit Failed - $th");
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
