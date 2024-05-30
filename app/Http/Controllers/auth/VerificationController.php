<?php

namespace App\Http\Controllers\auth;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\EmailVerificationToken;
use Illuminate\Validation\ValidationException;

class VerificationController extends Controller
{
    //
    public $msg = "";

    public function index(Request $req)
    {
        $req->validate([
            "token" => "required|string",
        ]);

        $emailData = EmailVerificationToken::where("token", $req->token)->first();
        if(!is_null($emailData))
        {
            $user = User::findOrFail($emailData->user_id);
            if(is_null($user))
            {
                $this->msg =  'Invalid verification tokenis_null';
                exit;
            }

            $dataCompare = now()->gt($emailData->expires_at);
            if(is_null($dataCompare))
            {
                $this->msg =  'The verification token has expired!';
                exit;
            }

            $user->is_verified = 1;
            $user->email_verified_at = now();
            $user->save();
    
            $this->msg =  'Email verified successfully!';

            EmailVerificationToken::where('email', $user->email)->delete();

        }
        else 
        {
            $this->msg =  'Invalid token!';
        }

        return view("auth.email-verify", [
            "msg" => $this->msg 
        ]);
    }

    public function verify(Request $req) 
    {
        // 
    }
}
