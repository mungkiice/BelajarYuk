<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class PenggunaAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::guard('web_user')->check() || 
            Auth::guard('user')->check() || 
            Auth::guard('web_pengajar')->check() || 
            Auth::guard('pengajar')->check()) {
            return $next($request);
        }
        return redirect('/home');
    }
}
