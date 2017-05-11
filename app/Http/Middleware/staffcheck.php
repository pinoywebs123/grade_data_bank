<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class staffcheck
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
        if(Auth::user()->role_id != 2){
            abort(404);
        }
        return $next($request);
    }
}
