<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('admin.profile', compact('user'));
    }

    // ==================== PROFILE UPDATE ====================
    public function updateProfile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'  => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:50',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator, 'profileErrors')->withInput();
        }

        $user = Auth::user();
        $user->name  = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('images'), $filename);
            $user->image = $filename;
        }

        $user->save();

        return back()->with('success', 'Profile updated successfully!');
    }

    // ==================== PASSWORD UPDATE ====================
    public function updatePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'current_password' => 'required',
            'new_password' => 'required|min:6',
            'new_password_confirmation' => 'required|same:new_password',
        ],[
            'new_password_confirmation.same' => 'Password confirmation does not match'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator, 'passwordErrors')->withInput();
        }

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->with('error', 'Current password is incorrect!');
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return back()->with('success', 'Password changed successfully!');
    }
}
