<?php

namespace App\Http\Controllers\customer;

use App\Models\User;
use App\Models\Account;
use App\Models\Transfer;
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


        $fromAccount = User::find(Auth::user()->id)->account()->first();
        $toAccount = Account::where("account_number", $req->dest_accountnumber)->with("user")->first();

        if(!empty($fromAccount))
        {
            if(!is_null($toAccount))
            {
                if($fromAccount->account_balance > $req->amount)
                {
                    if(Hash::check($req->transaction_pin, $fromAccount?->transaction_pin))
                    {

                        $transfer = Transfer::create([
                            //
                            "transfer_uuid" => Str::uuid(),
                            "from_account_id" => $fromAccount->id,
                            "to_account_id" => $toAccount->id,
                            "amount" => $req->amount,
                            "transfer_type" => "internal",
                            "status" => "pending",
                            // "completed_at" => "",
                            'reference' => 'PUR-INT' . uniqid(),
                            'description' => $req->description,
                        ]);

                        try 
                        {
                            $toAccount->increment('account_balance', $req->amount);
                            $fromAccount->decrement('account_balance', $req->amount);

                            $transfer->status = 'completed';
                            $transfer->completed_at = now();
                            $transfer->save();

                            
                            $transaction = Transaction::create([
                                
                                "transaction_uuid" => Str::uuid(),
                                "account_id" => $fromAccount->id,
                                "transfer_id" => $transfer->id,
                                "transaction_type"  => "debit",
                                "amount" => $req->amount,
                                "balance_after" => $fromAccount->account_balance,
                                "description" => $req->description,
                            ]);
            
                            if($transaction)
                            {
                                return back()->with("success", "Transfer Successful");
                            }
                            
                        } 
                        catch (\Throwable $th) 
                        {
                            $transfer->status = 'failed';
                            $transfer->save();
        
                            return back()->with("error", "Transfer Failed - $th");
                        }
    
                    }else{
                    
                        return back()->withErrors("transaction_pin", "Invalid Pin");
                    }
    
                }else{
                    
                    return back()->withErrors("error", "Insufficient balance");
                }

            }else{
                    
                return back()->withErrors("error", "Invalid account");
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
