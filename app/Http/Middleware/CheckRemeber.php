<?php

namespace App\Http\Middleware;

use Closure;

class CheckRemeber
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
        $remeber=$request->cookie('remeber');
        //var_dump($remeber);die;
        return $next($request);
    }
}
