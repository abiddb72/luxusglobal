<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PageController extends Controller
{
    public function index()
    {
        $pages = Page::all();
        return view('admin.pages.index', compact('pages'));
    }

    public function create()
    {
        return view('admin.pages.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'status' => 'required|boolean'
        ]);

        // Remove empty HTML tags like <p><br></p>
        $description = trim(strip_tags($request->description));
        if (empty($description)) {
            return back()->withErrors(['description' => 'The description field is required.'])->withInput();
        }

        Page::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title), // Auto Generate Slug
            'description' => $request->description,
            'status' => $request->status
        ]);

        return redirect()->route('admin.pages.index')->with('success', 'Page Created Successfully');
    }

    public function edit($id)
    {
        $page = Page::findOrFail($id);
        return view('admin.pages.edit', compact('page'));
    }

    public function update(Request $request, $id)
    {
        $page = Page::findOrFail($id);

        $request->validate([
            'title' => 'required',
            'status' => 'required|boolean'
        ]);

        // Remove empty HTML tags like <p><br></p>
        $description = trim(strip_tags($request->description));
        if (empty($description)) {
            return back()->withErrors(['description' => 'The description field is required.'])->withInput();
        }

        $page->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title), // Auto Regenerate Slug
            'description' => $request->description,
            'status' => $request->status
        ]);

        return redirect()->route('admin.pages.index')->with('success', 'Page Updated Successfully');
    }

    public function destroy($id)
    {
        Page::findOrFail($id)->delete();
        return redirect()->route('admin.pages.index')->with('success', 'Page Deleted Successfully');
    }
}
