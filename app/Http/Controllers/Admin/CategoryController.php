<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('sort', 'asc')->get();
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:categories,title',
            'type' => 'required|in:1,2,3',
            'feature_image' => 'required|image|mimes:jpg,jpeg,png|max:300', // required & only jpg,jpeg,png
        ]);

        // Max sort value
        $maxSort = Category::max('sort') ?? 0;

        // Upload feature image
        if ($request->hasFile('feature_image')) {
            $image = $request->file('feature_image');
            $imageName = time().'_'.$image->getClientOriginalName();
            $image->move(public_path('images/packages'), $imageName);
        } else {
            $imageName = null; // should not happen due to validation
        }

        Category::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'feature_image' => 'packages/'.$imageName,
            'type' => $request->type,
            'sort' => $maxSort + 1,  // automatic
            'status' => $request->status ?? 1,
        ]);

        return redirect()->route('admin.categories.index')->with('success', 'Category created successfully.');
    }



    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'title' => 'required|unique:categories,title,' . $category->id,
            'type' => 'required|in:1,2,3',
            'feature_image' => 'nullable|image|mimes:jpg,jpeg,png|max:300',
        ]);

        // Existing image ko default rakhenge
        $imageName = $category->feature_image;

        // New Image Upload
        if ($request->hasFile('feature_image')) {
            // Purani image delete karein (agar exists)
            if ($category->feature_image && file_exists(public_path('images/'.$category->feature_image))) {
                unlink(public_path('images/'.$category->feature_image));
            }

            $image = $request->file('feature_image');
            $newName = time().'_'.$image->getClientOriginalName();
            $image->move(public_path('images/packages'), $newName);
            $imageName = 'packages/' . $newName;
        }

        $category->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'feature_image' => $imageName,   // Same or updated
            'type' => $request->type,
            'status' => $request->status ?? 1,
        ]);

        return redirect()->route('admin.categories.index')->with('success', 'Category updated successfully.');
    }



    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.categories.index')->with('success', 'Category deleted successfully.');
    }

    public function sort(Request $request)
    {
        $order = $request->order;
        foreach($order as $item){
            Category::where('id', $item['id'])->update(['sort' => $item['position']]);
        }
        return response()->json(['status' => 'success']);
    }

    
}
