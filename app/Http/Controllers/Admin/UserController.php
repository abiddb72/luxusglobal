<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->get();
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'nullable|max:15',
            'password' => 'required|min:6',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:50',
        ]);

        $user = new User();
        $user->name  = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = Hash::make($request->password);

        if ($request->hasFile('image')) {
            $img = $request->file('image');
            $imgName = time().'.'.$img->getClientOriginalExtension();
            $img->move(public_path('images'), $imgName);
            $user->image = $imgName;
        }

        $user->save();

        return redirect()->route('admin.users.index')->with('success', 'User Created Successfully');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => 'nullable|max:15',
            'password' => 'nullable|min:6',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:200',
        ]);

        $user->name  = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;

        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        if ($request->hasFile('image')) {
            // Delete old image
            if ($user->image && File::exists(public_path('images/' . $user->image))) {
                File::delete(public_path('images/' . $user->image));
            }

            $img = $request->file('image');
            $imgName = time() . '.' . $img->getClientOriginalExtension();
            $img->move(public_path('images'), $imgName);
            $user->image = $imgName;
        }

        $user->save();

        return redirect()->route('admin.users.index')->with('success', 'User Updated Successfully');
    }
}
