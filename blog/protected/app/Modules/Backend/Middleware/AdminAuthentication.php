<?php

namespace App\Modules\Backend\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminAuthentication
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)            
    {
        if (Auth::guard('admin')->check()==false) {
            return view('Backend::login');
        }
        return $next($request);
    }
}
