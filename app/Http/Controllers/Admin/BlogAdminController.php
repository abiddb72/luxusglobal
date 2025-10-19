<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Str;

class BlogAdminController extends Controller
{
    // SHOW ALL BLOGS
    public function index()
    {
        $blogs = Blog::latest()->get();
        return view('admin.blogs.index', compact('blogs'));
    }

    // SHOW CREATE FORM
    public function create()
    {
        return view('admin.blogs.create');
    }

    // STORE DATA
    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'author'      => 'nullable|string|max:255',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png|max:200',
            'description' => 'required',
            'status'      => 'required|in:0,1',
        ]);

        $blog = new Blog();
        $blog->title = $request->title;
        $blog->slug = Str::slug($request->title);
        $blog->author = $request->author;
        $blog->description = $request->description;
        $blog->status = $request->status;

        // Store Image
        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images/blogs'), $imageName);
            $blog->image = 'blogs/' . $imageName;
        }

        $blog->save();

        return redirect()->route('admin.blogs.index')->with('success', 'Blog Created Successfully!');
    }

    // EDIT FORM
    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        return view('admin.blogs.edit', compact('blog'));
    }

    // UPDATE DATA
    public function update(Request $request, $id)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'author'      => 'nullable|string|max:255',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png|max:200',
            'description' => 'required',
            'status'      => 'required|in:0,1',
        ]);

        $blog = Blog::findOrFail($id);
        $blog->title = $request->title;
        $blog->slug = Str::slug($request->title);
        $blog->author = $request->author;
        $blog->description = $request->description;
        $blog->status = $request->status;

        // Update Image
        if ($request->hasFile('image')) {
            if ($blog->image && file_exists(public_path('images/'.$blog->image))) {
                unlink(public_path('images/'.$blog->image));
            }
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images/blogs'), $imageName);
            $blog->image = 'blogs/' .$imageName;
        }

        $blog->save();

        return redirect()->route('admin.blogs.index')->with('success', 'Blog Updated Successfully!');
    }

    // DELETE BLOG
    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        if ($blog->image && file_exists(public_path('images/'.$blog->image))) {
            unlink(public_path('images/'.$blog->image));
        }
        $blog->delete();

        return redirect()->route('admin.blogs.index')->with('success', 'Blog Deleted Successfully!');
    }
}
