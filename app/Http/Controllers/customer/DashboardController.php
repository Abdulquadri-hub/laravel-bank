<?php

namespace App\Http\Controllers\customer;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $customer = User::find(Auth::user()->id)->account()->first();

        return view("customer.dashboard", [
            "customer" => $customer
        ]);
    }
}
