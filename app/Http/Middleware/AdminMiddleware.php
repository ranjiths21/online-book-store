<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login')->with('error', 'Please login as admin.');
        }

        return $next($request);
    }
}

