<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountVerified
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        
        if(Auth::user()->profile->no_tlp){
            
            if(Auth::user()->user_detail->account_verified_at){
                return $next($request);
            }
                Auth::logout();
                return redirect('/')->with(['warning'=>'Hubungi Admin Untuk Verifikasi Akun']);
        }
        return $next($request);           

    }
}
