<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Visa;
use Illuminate\Support\Str;

class VisaAdminController extends Controller
{
    public function index()
    {
        $visas = Visa::all();
        return view('admin.visas.index', compact('visas'));
    }

    public function create()
    {
        return view('admin.visas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'country_title' => 'required|string|max:255',
            'status'        => 'required|boolean',
            'country_image'    => 'required|image|mimes:jpeg,png,jpg|max:50',
            'feature_image' => 'required|image|mimes:jpeg,png,jpg|max:200',
        ]);

        

        $data = $request->only(['country_title','visa_description','embassy_requirements','duration_description','status']);
        $data['slug'] = Str::slug($request->country_title);

        // Flag Image
        if($request->hasFile('country_image')){
            $flagName = time().'-flag.'.$request->country_image->extension();
            $request->country_image->move(public_path('images/flags'), $flagName);
            $data['country_image'] = 'flags/'.$flagName;
        }

        // Feature Image
        if($request->hasFile('feature_image')){
            $featureName = time().'-feature.'.$request->feature_image->extension();
            $request->feature_image->move(public_path('images/flags'), $featureName);
            $data['feature_image'] = 'flags/'.$featureName;
        }

        

        Visa::create($data);

        return redirect()->route('admin.visas.index')->with('success', 'Visa Created Successfully');
    }

    public function edit($id)
    {
        $visa = Visa::findOrFail($id);
        return view('admin.visas.edit', compact('visa'));
    }

    public function update(Request $request, $id)
    {
        $visa = Visa::findOrFail($id);

        $request->validate([
            'country_title' => 'required|string|max:255',
            'status'        => 'required|boolean',
            'country_image'    => 'nullable|image|mimes:jpeg,png,jpg|max:50',
            'feature_image' => 'nullable|image|mimes:jpeg,png,jpg|max:200',
        ]);

        

        $data = $request->only(['country_title','visa_description','embassy_requirements','duration_description','status']);
        $data['slug'] = Str::slug($request->country_title);

        // Update Flag Image
        if($request->hasFile('country_image')){
            if($visa->country_image && file_exists(public_path('images/'.$visa->country_image))){
                unlink(public_path('images/'.$visa->country_image));
            }
            $flagName = time().'-flag.'.$request->country_image->extension();
            $request->country_image->move(public_path('images/flags'), $flagName);
            $data['country_image'] = 'flags/'.$flagName;
        }

        // Update Feature Image
        if($request->hasFile('feature_image')){
            if($visa->feature_image && file_exists(public_path('images/'.$visa->feature_image))){
                unlink(public_path('images/'.$visa->feature_image));
            }
            $featureName = time().'-feature.'.$request->feature_image->extension();
            $request->feature_image->move(public_path('images/flags'), $featureName);
            $data['feature_image'] = 'flags/'.$featureName;
        }

        $visa->update($data);

        return redirect()->route('admin.visas.index')->with('success', 'Visa Updated Successfully');
    }

    public function destroy($id)
    {
        $visa = Visa::findOrFail($id);

        if($visa->country_image && file_exists(public_path('images/'.$visa->country_image))){
            unlink(public_path('images/'.$visa->country_image));
        }

        if($visa->feature_image && file_exists(public_path('images/'.$visa->feature_image))){
            unlink(public_path('images/'.$visa->feature_image));
        }

        $visa->delete();

        return redirect()->route('admin.visas.index')->with('success', 'Visa Deleted Successfully');
    }
}

