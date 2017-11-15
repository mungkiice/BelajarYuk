<?php

namespace App\Http\Middleware;

use Closure;

class PelajarAuthenticated
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
        if (Auth::guard('web_user')->check() || Auth::guard('user')->check()) {
            return $next($request);
        }
        return redirect('/home');
    }
}
