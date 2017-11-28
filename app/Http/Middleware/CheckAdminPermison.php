<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckAdminPermison
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
        if( Auth::user()->permison != config('customer.user.permison'))
            return redirect()->route('home');

        return $next($request);
    }
}
