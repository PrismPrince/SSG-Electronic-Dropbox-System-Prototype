<?php

namespace App\Http\Middleware;

use Closure;

class ModeratorRoleMiddleware
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
        if (\Auth::user()->role == 'moderator') {
            return $next($request);
        }

        return response('blank', 404);
        //return $next($request);
    }
}
