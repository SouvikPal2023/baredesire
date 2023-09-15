<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        // if (! $request->expectsJson()) {
        //     return route('dashboard');
        // }
        if (! $request->expectsJson()) {
            if(substr($request->getPathInfo(), 0, 6) === '/admin'){
                return route('admin.login');
            }
             return route('loginForm');
            
        }
    }
}
