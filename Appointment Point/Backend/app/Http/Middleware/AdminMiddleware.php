<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Token;
use App\Models\UserModel;

class AdminMiddleware
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

        if ($user->TYPE === "ADMIN") {
            return $next($request);
        }
        return response()->json([
            'msg'=> "Access denied"
        ]);
    }
}
