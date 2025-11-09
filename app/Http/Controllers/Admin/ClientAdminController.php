<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Gallery;
use Str;

class ClientAdminController extends Controller
{
    public function index()
    {
        $clients = Client::all();
        return view('admin.clients.index', compact('clients'));
    }

    public function create()
    {
        return view('admin.clients.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'profession'  => 'required|string|max:255',
            'image'       => 'required|image|mimes:jpg,jpeg,png|max:50',
            'description' => 'nullable|string',
            'rating'      => 'required|integer|min:1|max:5',
            'status'      => 'required|boolean',

            // Gallery Images Validation
            'gallery_images.*' => 'nullable|image|mimes:jpg,jpeg,png|max:200',
        ]);

        $data = $request->only(['name', 'profession', 'description', 'rating', 'status']);

        // Slug generate
        $data['slug'] = Str::slug($request->name) . '-' . time();

        // Image upload
        if ($request->hasFile('image')) {
            $image = time() . '_' . $request->image->getClientOriginalName();
            $request->image->move(public_path('images/clients'), $image);
            $data['image'] = 'clients/' . $image;
        }

        // Create Client
        $client = Client::create($data);

        // ✅ Save Gallery Images
        if ($request->hasFile('gallery_images')) {
            foreach ($request->gallery_images as $galleryImg) {

                $imgName = time() . '_' . $galleryImg->getClientOriginalName();
                $galleryImg->move(public_path('images/gallery'), $imgName);

                Gallery::create([
                    'client_id' => $client->id,
                    'image'     => 'gallery/' . $imgName,
                ]);
            }
        }

        return redirect()->route('admin.clients.index')
                         ->with('success', 'Client Created Successfully');
    }

    public function edit($id)
    {
        $client = Client::findOrFail($id);
        $galleries = Gallery::where('client_id', $id)->get();

        return view('admin.clients.edit', compact('client', 'galleries'));
    }

    public function update(Request $request, $id)
    {
        $client = Client::findOrFail($id);

        $request->validate([
            'name'        => 'required|string|max:255',
            'profession'  => 'required|string|max:255',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png|max:50',
            'description' => 'nullable|string',
            'rating'      => 'required|integer|min:1|max:5',
            'status'      => 'required|boolean',

            // Gallery Images Validation
            'gallery_images.*' => 'nullable|image|mimes:jpg,jpeg,png|max:200',
        ]);

        $data = $request->only(['name', 'profession', 'description', 'rating', 'status']);

        // Slug update only if name changed
        if ($client->name != $request->name) {
            $data['slug'] = Str::slug($request->name) . '-' . time();
        }

        // Main Image update
        if ($request->hasFile('image')) {

            if ($client->image && file_exists(public_path('images/' . $client->image))) {
                unlink(public_path('images/' . $client->image));
            }

            $image = time() . '_' . $request->image->getClientOriginalName();
            $request->image->move(public_path('images/clients'), $image);
            $data['image'] = 'clients/' . $image;
        }

        // Update client data
        $client->update($data);

        // ✅ Add New Gallery Images (Max 3 logic handled in front-end UI)
        if ($request->hasFile('gallery_images')) {
            foreach ($request->gallery_images as $galleryImg) {

                $imgName = time() . '_' . $galleryImg->getClientOriginalName();
                $galleryImg->move(public_path('images/gallery'), $imgName);

                Gallery::create([
                    'client_id' => $client->id,
                    'image'     => 'gallery/' . $imgName,
                ]);
            }
        }

        return redirect()->route('admin.clients.index')
                         ->with('success', 'Client Updated Successfully');
    }

    public function destroy($id)
    {
        $client = Client::findOrFail($id);

        // Delete client main image
        if ($client->image && file_exists(public_path('images/' . $client->image))) {
            unlink(public_path('images/' . $client->image));
        }

        // ✅ Delete gallery images
        $galleries = Gallery::where('client_id', $client->id)->get();
        foreach ($galleries as $gallery) {
            if ($gallery->image && file_exists(public_path('images/' . $gallery->image))) {
                unlink(public_path('images/' . $gallery->image));
            }
            $gallery->delete();
        }

        // Delete client
        $client->delete();

        return redirect()->route('admin.clients.index')
                         ->with('success', 'Client Deleted Successfully');
    }

    public function deleteGallery($id)
    {
        $gallery = Gallery::findOrFail($id);

        if ($gallery->image && file_exists(public_path('images/'.$gallery->image))) {
            unlink(public_path('images/'.$gallery->image));
        }

        $gallery->delete();

        return response()->json(['success' => true]);
    }
}
