<?php

namespace App\Http\Controllers;

use App\Models\kyc;
use App\libs\Purple;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KycController extends Controller
{
    //

    public function index()
    {

        $mode = isset($_GET['mode']) ? $_GET['mode'] : "";

        return view("customer.kyc.kyc", [
            "mode" => $mode
        ]);
    }

    public function submitIdVerification(Request $req)
    {
        $user = User::find(Auth::user()->id);

        $mode = isset($_GET['mode']) ? $_GET['mode'] : "";

        if($mode === "nin")
        {
            $req->validate([
                "nin" => "required|numeric|unique:kycs,nin"
            ]);

            if(!is_null($user))
            {
                $kyc = Kyc::where("status", Kyc::STATUS_APPROVED)
                    ->where("user_id", $user->id)
                    ->where("verification_type",   $mode)
                    ->where("request_type",  Kyc::REQUEST_TYPE_CUSTOMER)->first();
    
                if(is_null($kyc))
                {
                    $kyc = new kyc([
                        "user_id" => $user->id,
                        "nin" => $req->input("nin"),
                        "verification_type" => $mode,
                        "request_type" => Kyc::REQUEST_TYPE_CUSTOMER, 
                        "status" => Kyc::STATUS_APPROVED,#change back status to pending when admin exists
                    ]);
                }
                else 
                {
                    $kyc->nin = $req->input("nin");
                }
    
                $save = $kyc->save();
    
                if($save)
                {
                    
                    #send admin notification to approve
                    return redirect()->route("customer.dashboard")->with("success", "Kyc Successfull. Continuing Enjoying Our Services!");
                }
            }


            return back()->withErrors("nin", "Something went wrong!");

        }
        elseif($mode === "govt_id")
        {
            $req->validate([
                'govt_id_url' => 'required|image|max:3048',
            ]);


            $kyc = Kyc::where("status", Kyc::STATUS_APPROVED)
                ->where("user_id", $user->id)
                ->where("verification_type",   $mode)
                ->where("request_type",  Kyc::REQUEST_TYPE_CUSTOMER)->first();

            if(is_null($kyc))
            {
                if($req->file("govt_id_url"))
                {
                    $kyc = new kyc([
                        "user_id" => $user->id,
                        "govt_id_url" => Purple::uploadFile($req->file('govt_id_url'), '/customer/gvt-ids'),
                        "verification_type" => $mode,
                        "request_type" => Kyc::REQUEST_TYPE_CUSTOMER, 
                        "status" => Kyc::STATUS_APPROVED, #change back status to pending when admin exists
                    ]);
                }
            }
            else 
            {
                if($req->file("govt_id_url"))
                {
                    $kyc->govt_id_url = Purple::uploadFile($req->file('govt_id_url'), '/customer/gvt-ids');
                }
            }

            $save = $kyc->save();

            
            if($save)
            {
                #send admin notification to approve
                return redirect()->route("customer.dashboard")->with("success", "Kyc Successfull. Continuing Enjoying Our Services!");
            }

            return back()->withErrors("govt_id_url", "Something went wrong!");
            
        }

        return view("customer.kyc.kyc", [
            "mode" => $mode
        ]);
    }

    public function approveIdverification()
    {
        //
    }

    public function rejectIdverification()
    {
        //
    }


}
