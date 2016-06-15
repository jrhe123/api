<?php

namespace App\Http\Middleware;

use Closure;

class TokenAuthenticate
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
        /*add rules to token authentication*/
        /*insert code here ..*/
        return $next($request);
    }
}
