<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class UserAdmin
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
        if (Auth::User() && Auth::user()->role == 'Admin') {
            return $next($request);
        }
        return redirect('home')->with('error', 'No tiene permisos para ver el contenido!');
    }
}
