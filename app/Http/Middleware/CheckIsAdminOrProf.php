<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckIsAdminOrProf
{
    public function handle($request, Closure $next)
    {
        $requestedUserId = $request->route()->parameter('id');

        if(
            Auth::user()->role === "Admin" ||
            Auth::user()->id == $requestedUserId
        ) {
            return $next($request);
        }

        else {
            return response()->json(['error' => 'Unauthorized'], 403);
        }
    }
}
