<?php

namespace App\libs;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Purple  
{
    //
    const LINK_CUSTOMER = "customer";
    const LINK_ADMIN = "admin";
    const TRANSACTION_TYPE = "";

    public static function emailVerificationClientLink($user, $linkFor = 'customer')
    {

        $hash = "pur-eml-tk-" . Str::uuid();
        $url = '';

        $data = [
            'token' => $hash,
            'expires_at' => now()->addHours(48),
            'email' => $user->email,
        ];

        if ($linkFor == static::LINK_CUSTOMER) {
            $data['user_id'] = $user->id;
            $url = env('APP_FRONTEND_URL');
        }

        if ($linkFor == static::LINK_ADMIN) {
            $data['user_id'] = $user->id;
            $url = env('APP_FRONTEND_ADMIN_URL');
        }

        DB::table('email_verification_tokens')->insert($data);

        $link = $url . "auth/verify-email/?token=$hash&email={$user->email}";
        return $link;
    }

    public static function uploadFile($file, $path = "/images")
    {
        $fileName = time() . "." . $file->extension();
        $file->move(public_path($path), $fileName);
        $fullPath = config("app.url") . "$path/$fileName";

        return $fullPath;
    }

    public static function checkAge($dob_input)
    {
        $dob = Carbon::createFromFormat('Y-m-d', $dob_input);

        $age = $dob->age;
        if($age < 18)
        {
            //
        }
        
    }

    public static function generateAccountNumber()
    {
        $randomPart = str_pad(mt_rand(0, 999999), 8, '0', STR_PAD_LEFT);
    
        return 23 . $randomPart;
    }

    public static function __callStatic($method, $arguments)
    {
        $property = strtolower(str_replace("get", "", $method));
        if(!empty(session("USER")->$property)) 
        {
            return session("USER")->$property;
        }  

        return "unknown";
    }

    // public function setTransactionType($ty)
    // {
    //     //
    // }
    
}