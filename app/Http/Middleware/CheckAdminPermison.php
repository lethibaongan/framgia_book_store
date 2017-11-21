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
        if(Auth::check() != config('customer.user.login') {
            return redirect(url('login'));
        }
        
        if( Auth::user()->permison != config('customer.user.permison'))
            return redirect(url('home'));
        else
            return $next($request);
    }
}
