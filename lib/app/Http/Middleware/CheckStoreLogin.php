<?php

namespace App\Http\Middleware;

use Closure, Session;

class CheckStoreLogin
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
        if(Session::has('email')){
            return $next($request);
        }else{
            return redirect('/');
        }
    }
}
