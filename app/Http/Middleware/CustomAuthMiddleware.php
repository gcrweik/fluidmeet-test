<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;

class CustomAuthMiddleware
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
        $token = $request->header('api_token');
        if($token != '') {
            $user = User::where('remember_token', $token)->first();
            if(!$user) {
                return response()->json(['status'=>false, 'code'=>401, 'message'=>'User is not found in our database.']);
            }
            if($user->role_id == 2) {
                return response()->json(['status'=>false, 'code'=>401, 'message'=>'User is not an owner.']);
            }
        } else {
            return response()->json(['API Token not found.', 401]);
        }
        return $next($request);
    }
}
