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
        $transactions = $customer->transactions()->with(['deposit', 'transfer', 'account'])->paginate();
        // dd($transactions);

        return view("customer.dashboard", [
            "customer" => $customer,
            "transactions" => $transactions
        ]);
    }
}
