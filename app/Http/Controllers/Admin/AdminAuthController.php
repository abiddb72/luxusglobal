<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminAuthController extends Controller
{
    public function showLoginForm()
    {
        if (auth()->check() && auth()->user()->is_admin == 1) {
            return redirect()->route('admin.dashboard');
        }
        return view('admin.layouts.auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user && $user->is_admin == 1) {
            if (Hash::check($request->password, $user->password)) {
                Auth::login($user, $request->has('remember'));
                return redirect()->route('admin.dashboard');
            }
            return back()->with('error', 'Invalid password.');
        }

        return back()->with('error', 'Unauthorized login attempt.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login.form');
    }
}

