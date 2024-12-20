<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;


class PermissionMiddleware
{
    public function handle($request, Closure $next, $permission)
    {
        if (auth()->check() && auth()->user()->hasPermission($permission)) {
            return $next($request);
        }
        abort(403, 'Unauthorized.');
    }
}

