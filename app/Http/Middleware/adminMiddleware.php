<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class adminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if((session()->missing('USER')) || (Auth::check()))
        {
            $user = Auth::user();
            if($user->is_admin)
            {
                return redirect()->route("admin.dashboard");
            }

        }else{

            return redirect()->route('auth.login');
        }
        
        return $next($request);
    }
}
