<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    // Existing category method
    public function category(Request $request, $slug)
    {
        $category = Category::where('slug', $slug)
                            ->where('status', 1)
                            ->firstOrFail();

        $title = $category->title;
        $is_tabbed = strtolower($slug) === 'international';

        if ($is_tabbed) {
            $cities = Package::where('cat_id', $category->id)
                            ->where('is_delete', 0)
                            ->whereNotNull('departure_city')
                            ->pluck('departure_city')
                            ->unique();

            $packages_per_city = [];
            foreach ($cities as $city) {
                $packages_per_city[$city] = Package::where('cat_id', $category->id)
                    ->where('departure_city', $city)
                    ->where('status', 1)
                    ->where('is_delete', 0)
                    ->latest()
                    ->take(12)
                    ->get();
            }

            return view('packages.index', compact('category', 'title', 'is_tabbed', 'cities', 'packages_per_city'));
        }

        $packages = Package::where('cat_id', $category->id)
                        ->where('status', 1)
                        ->where('is_delete', 0)
                        ->latest()
                        ->paginate(9);

        return view('packages.index', compact('category', 'title', 'is_tabbed', 'packages'));
    }

    // 🔹 New method: Show package by slug
    public function showBySlug($slug)
    {
        $package = Package::where('slug', $slug)
                          ->where('status', 1)
                          ->where('is_delete', 0)
                          ->firstOrFail();

        return view('packages.show', compact('package'));
    }

    public function search(Request $request)
    {
        $query = Package::query();

        // Category Filter
        if ($request->cat_id) {
            $query->where('cat_id', $request->cat_id);
        }

        // Stay / Days Filter (String to Number Conversion)
        if ($request->min_days && $request->max_days) {
            $query->whereRaw("
                CAST(REGEXP_REPLACE(stay, '[^0-9]', '') AS UNSIGNED)
                BETWEEN ? AND ?
            ", [$request->min_days, $request->max_days]);
        }

        // Price Filter
        if ($request->min_price && $request->max_price) {
            $query->whereBetween('price', [$request->min_price, $request->max_price]);
        }

        $packages = $query->paginate(12);

        return view('packages.search', compact('packages'));
    }


}
