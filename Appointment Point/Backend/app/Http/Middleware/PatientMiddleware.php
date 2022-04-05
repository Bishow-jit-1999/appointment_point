<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Token;
use App\Models\UserModel;
use Illuminate\Http\Request;

class PatientMiddleware
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
        $token = $request->header('token');
        $token_user = Token::where('token', $token)->where('expired', false)->first();
        $user = UserModel::where('ID', $token_user->user_id)->first();

        if ($user->TYPE === "PATIENT") {
            return $next($request);
        }
        return response()->json([
            'msg'=> "Access denied"
        ]);
    }
}
