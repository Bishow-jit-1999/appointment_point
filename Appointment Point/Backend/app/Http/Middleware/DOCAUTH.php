<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class DOCAUTH
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
        $usertype=session()->get('userType');
        if($usertype=='DOCTOR'){
            return $next($request);
        }
        return redirect()->route('home');

    }

    
}
