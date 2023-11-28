<?php

namespace App\Http\Middleware;

use Closure;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

    public function handle($request, Closure $next)
    {
        $adminAllowRoute = ['user.*', 'post.*'];
        $editorAllowRoute = ['post.*'];

        if (request()->routeIs($adminAllowRoute) && auth()->guard('admin')->user()->hasRole('admin')) {
            return $next($request);
        }

        if (request()->routeIs($editorAllowRoute) && auth()->guard('admin')->user()->hasRole('editor')) {
            return $next($request);
        }

        return abort('403', __("You don't have permission to perform this operation"));
    }
}
