<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Package;
use App\Models\Category;
use Illuminate\Support\Str;

class PackageController extends Controller
{
    public function index()
    {
        $packages = Package::where('is_delete', 0)->latest()->get();
        return view('admin.packages.index', compact('packages'));
    }

    public function create()
    {
        $categories = Category::where('status',1)->get();
        return view('admin.packages.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:packages,title',
            'cat_id' => 'required|exists:categories,id',
            'price' => 'required|numeric',
            'description' => 'nullable',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:50',
            'feature_image' => 'required|image|mimes:jpg,jpeg,png|max:200',
            'departure_city' => 'required|string',
            'departure_country' => 'required|string',
            'destination_country' => 'required|string',
            'destination_city' => 'required|string',
            'min_person_allowed' => 'required|integer|between:1,50',
            'ticket' => 'required|in:0,1',
            'visa' => 'required|in:0,1',
            'insurance' => 'required|in:0,1',
            'stay' => 'required|integer',
            'hotel_choice' => 'required|integer|between:1,5',
            'company' => 'required|string',
            'rate_mentioned' => 'required|in:0,1',
            'expire_date' => 'required|date',
            'is_featured' => 'required|in:0,1'
        ]);

        // Handle Image Upload
        $imagePath = null;
        $featureImagePath = null;

        if ($request->hasFile('image')) {
            $imageName = time().'_image.'.$request->image->extension();
            $request->image->move(public_path('images/packages'), $imageName);
            $imagePath = 'packages/'.$imageName;
        }

        if ($request->hasFile('feature_image')) {
            $featureImageName = time().'_feature.'.$request->feature_image->extension();
            $request->feature_image->move(public_path('images/packages'), $featureImageName);
            $featureImagePath = 'packages/'.$featureImageName;
        }

        Package::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title), // Auto Slug
            'cat_id' => $request->cat_id,
            'is_featured' => $request->is_featured,
            'price' => $request->price,
            'description' => $request->description,
            'package_included' => $request->package_included,
            'package_summary' => $request->package_summary,
            'package_exclusions' => $request->package_exclusions,
            'terms_condition' => $request->terms_condition,
            'image' => $imagePath,
            'feature_image' => $featureImagePath,
            'departure_country' => $request->departure_country,
            'departure_city' => $request->departure_city,
            'destination_country' => $request->destination_country,
            'destination_city' => $request->destination_city,
            'min_person_allowed' => $request->min_person_allowed,
            'ticket' => $request->ticket,
            'visa' => $request->visa,
            'insurance' => $request->insurance,
            'stay' => $request->stay . ' Days',
            'hotel_choice' => $request->hotel_choice . ' Star',
            'company' => $request->company,
            'rate_mentioned' => $request->rate_mentioned,
            'expire_date' => $request->expire_date,
            'status' => $request->status ?? 1,
        ]);

        return redirect()->route('admin.packages.index')->with('success', 'Package created successfully.');
    }

    public function edit(Package $package)
    {
        $categories = Category::where('status',1)->get();
        return view('admin.packages.edit', compact('package','categories'));
    }

    public function update(Request $request, Package $package)
    {
        $request->validate([
            'title' => 'required|unique:packages,title,' . $package->id,
            'cat_id' => 'required|exists:categories,id',
            'price' => 'required|numeric',
            'description' => 'nullable',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:50',
            'feature_image' => 'nullable|image|mimes:jpg,jpeg,png|max:200',
            'departure_city' => 'required|string',
            'departure_country' => 'required|string',
            'destination_country' => 'required|string',
            'destination_city' => 'required|string',
            'min_person_allowed' => 'required|integer|between:1,50',
            'ticket' => 'required|in:0,1',
            'visa' => 'required|in:0,1',
            'insurance' => 'required|in:0,1',
            'stay' => 'required|integer',
            'hotel_choice' => 'required|integer|between:1,5',
            'company' => 'required|string',
            'rate_mentioned' => 'required|in:0,1',
            'expire_date' => 'required|date',
            'is_featured' => 'required|in:0,1'
        ]);

        // Update Images
        if ($request->hasFile('image')) {
            $imageName = time().'_image.'.$request->image->extension();
            $request->image->move(public_path('images/packages'), $imageName);
            $package->image = 'packages/'.$imageName;
        }

        if ($request->hasFile('feature_image')) {
            $featureImageName = time().'_feature.'.$request->feature_image->extension();
            $request->feature_image->move(public_path('images/packages'), $featureImageName);
            $package->feature_image = 'packages/'.$featureImageName;
        }

        $package->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'cat_id' => $request->cat_id,
            'is_featured' => $request->is_featured,
            'price' => $request->price,
            'description' => $request->description,
            'package_included' => $request->package_included,
            'package_summary' => $request->package_summary,
            'package_exclusions' => $request->package_exclusions,
            'terms_condition' => $request->terms_condition,
            'departure_country' => $request->departure_country,
            'departure_city' => $request->departure_city,
            'destination_country' => $request->destination_country,
            'destination_city' => $request->destination_city,
            'min_person_allowed' => $request->min_person_allowed,
            'ticket' => $request->ticket,
            'visa' => $request->visa,
            'insurance' => $request->insurance,
            'stay' => $request->stay . ' Days',
            'hotel_choice' => $request->hotel_choice . ' Star',
            'company' => $request->company,
            'rate_mentioned' => $request->rate_mentioned,
            'expire_date' => $request->expire_date,
            'status' => $request->status ?? 1,
        ]);

        return redirect()->route('admin.packages.index')->with('success', 'Package updated successfully.');
    }

    public function destroy(Package $package)
    {
        $package->update([
            'is_delete' => 1
        ]);
        return redirect()->route('admin.packages.index')->with('success', 'Package deleted successfully.');
    }
}
