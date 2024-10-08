<?php

namespace NdaartuAPI\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckIsAdmin
{
    public function handle($request, Closure $next)
    {
        if(Auth::user()->role === "Admin") {
            return $next($request);
        }

        else {
            return response()->json(['error' => 'Vous avez pas droit d\'acceder a cette page '], 403);
        }
    }
}
