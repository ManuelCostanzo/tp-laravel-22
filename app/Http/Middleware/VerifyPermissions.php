<?php

namespace App\Http\Middleware;

use Closure;
use Gate;
use Illuminate\Support\Facades\Auth;

class VerifyPermissions
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $action, $guard = null)
    {

        if (Gate::denies($action)) {
            return redirect('/');
        }

        return $next($request);
    }
}
