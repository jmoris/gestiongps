<?php

namespace App\Http\Middleware;

use Closure;

class ConnectedMiddleware
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
        $user = \App\Implementation\UserStore::getInstance();
        if(!$user->isConnected()){ return redirect('/login'); }
        return $next($request);
    }
}
