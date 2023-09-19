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
        //     return route('login');
        // }

        // if (! $request->expectsJson()) {
        //     return route('login');
        // }
        if ($request->routeIs('admin.*')) {
            return route('admin.login');
        }

        if ($request->routeIs('guardian.*')) {
            return route('guardian.login');
        }

        // if ($request->routeIs('account.*')) {
        //     return route('account.login');
        // }
        return $request->expectsJson() ? null : route('login');

    }
}
