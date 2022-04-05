<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use App\Models\Token;
use App\Models\DOCTOR;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo(Request $request, Closure $next)
    {
        $token = $request->header('token');
        $token_user = Token::where('token', $token)->where('expired', false)->first();
        $user = DOCTOR::where('ID', $token_user->user_id)->first();

        if ($user) {
            return $next($request);
        }
        else return response()->json([
            "msg"=> "Invalid request"
        ]);
    }
}
