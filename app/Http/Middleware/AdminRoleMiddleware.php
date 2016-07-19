<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class AdminRoleMiddleware
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
        if (\Auth::user()->role == 'admin') {
            return $next($request);
        }

        Session::flash('error', 'Not allowed');
        return redirect('/');
    }
}
