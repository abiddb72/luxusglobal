<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Blog;
use App\Models\Package;
use App\Models\Client;
use App\Models\Visa;
use App\Models\Gallery;

class HomeController extends Controller
{
    public function index()
    {
        $banners = Banner::where('status', 1)->latest()->get();
        $blogs = Blog::latest()->take(6)->get(); // Latest 6 blogs
        $clients = Client::where('status', 1)->latest()->get();
        $visas = Visa::where('status', 1)->orderBy('country_title', 'asc')->take(12)->get();
        $all_packages = Package::where('is_delete', 0)
                    ->latest()
                    ->take(12)
                    ->where('status', 1)
                    ->get();

        $international_packages = Package::where('is_delete', 0)->where('cat_id', 2)->where('status', 1)->get();
        // ✅ Get all gallery images for this client    
        $gallery = Gallery::inRandomOrder()->take(12)->get();
        // Group by departure_city for tabs
        $grouped_packages = $international_packages->groupBy('departure_city');

        return view('home', compact('banners', 'blogs', 'grouped_packages','all_packages','clients','visas','gallery'));
    }
}
