<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Http\Exceptions\MaintenanceModeException;

class CheckForMaintenanceMode
{
    protected $app;

    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    public function handle($request, Closure $next)
    {
        if (!config('settings.site_enabled') && !$this->isBackendRequest($request)) {

            throw new MaintenanceModeException(null, null, null);
        }

        return $next($request);
    }

    private function isBackendRequest($request)
    {
        return ($request->is('admin/*') or $request->is('admin') or $request->is('login'));
    }
}