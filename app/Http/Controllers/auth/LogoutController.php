<?php

namespace App\Http\Controllers\auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    //
    public function index(Request $req)
    {
        if(Auth::check())
        {
            Auth::logout();

            $req->session()->invalidate();
        
            $req->session()->regenerateToken();
    
            return redirect('/auth/login');
        }
    }

}
