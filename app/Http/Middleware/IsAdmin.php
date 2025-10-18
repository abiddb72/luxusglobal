<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    public function handle(Request $request, Closure $next): Response
    {
        // Check if user is logged in and is admin
        if (auth()->check() && auth()->user()->is_admin == 1) {
            return $next($request);
        }

        // If not admin or not logged in → redirect to admin login
        return redirect()->route('admin.login.form')->with('error', 'You are not authorized to access this area.');
    }
}
