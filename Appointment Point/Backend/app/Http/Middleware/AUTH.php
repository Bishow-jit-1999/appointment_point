<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AUTH
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
        if($usertype=='ADMIN'){
            return $next($request);
        }
        return redirect()->route('home');

    }
           
    

    
}
