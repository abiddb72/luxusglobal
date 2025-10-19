<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    // Blog Listing Page
    public function index()
    {
        $blogs = Blog::where('status', 1)->latest()->paginate(6); // Only Active Blogs
        return view('blogs.index', compact('blogs'));
    }

    // Blog Detail Page
    public function show($slug)
    {
        $blog = Blog::where('slug', $slug)->where('status', 1)->firstOrFail();
        return view('blogs.show', compact('blog'));
    }
}
