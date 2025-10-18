<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    protected function redirectTo($request): ?string
    {
        // Agar request JSON nahi hai to admin login par redirect kare
        return $request->expectsJson() ? null : route('admin.login.form');
    }
}
