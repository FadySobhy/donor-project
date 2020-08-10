<?php

namespace App\Http\Middleware;

use Closure;

class PasswordChangedMiddleware
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
        if(auth()->check() && auth()->user()->need_to_change_password){
            return redirect()->route('users.password.form');
        }

        return $next($request);
    }
}
