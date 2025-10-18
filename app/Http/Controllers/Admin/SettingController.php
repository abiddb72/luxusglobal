<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use Illuminate\Support\Facades\File;

class SettingController extends Controller
{
    public function index()
    {
        $setting = Setting::first();
        return view('admin.settings', compact('setting'));
    }

    public function update(Request $request)
    {
        $setting = Setting::first();

        $request->validate([
            'meta_title' => 'required|string|max:255',
            'email'      => 'required|email',
            'contact_no' => 'required',
            'whatsapp_number' => 'nullable',
            'footer_text' => 'nullable|string',
            'description' => 'nullable',
            'facebook_link' => 'nullable|url',
        ]);

        $data = $request->except(['header_logo','footer_logo','favicon']);

        // Upload Files (Same code)
        if ($request->hasFile('header_logo')) {
            $file = $request->file('header_logo');
            $filename = 'header_logo_'.time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('images'), $filename);
            $data['header_logo'] = $filename;
        }

        if ($request->hasFile('footer_logo')) {
            $file = $request->file('footer_logo');
            $filename = 'footer_logo_'.time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('images'), $filename);
            $data['footer_logo'] = $filename;
        }

        if ($request->hasFile('favicon')) {
            $file = $request->file('favicon');
            $filename = 'favicon_'.time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('images'), $filename);
            $data['favicon'] = $filename;
        }
        $setting->update($data);

        return back()->with('success', 'Settings Updated Successfully!');
    }

}
