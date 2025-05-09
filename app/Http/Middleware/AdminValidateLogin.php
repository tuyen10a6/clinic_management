<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminValidateLogin
{
    public function handle(Request $request, Closure $next)
    {
        $check = Auth::user();

        if (isset($check) && $check->permission == 'manager') {
             return $next($request);
        }

        return redirect()->route('login');
    }
}
