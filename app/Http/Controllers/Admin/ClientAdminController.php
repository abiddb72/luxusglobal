<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;
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
            'name' => 'required',
            'profession' => 'required|string',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:50',
            'description' => 'nullable',
            'status' => 'required|boolean',
        ]);

        $data = $request->only(['name','profession','description','status']);

        if ($request->hasFile('image')) {
            $image = time().'_'.$request->image->getClientOriginalName();
            $request->image->move(public_path('images/clients'), $image);
            $data['image'] = 'clients/'.$image;
        }

        Client::create($data);
        return redirect()->route('admin.clients.index')->with('success', 'Client Created Successfully');
    }

    public function edit($id)
    {
        $client = Client::findOrFail($id);
        return view('admin.clients.edit', compact('client'));
    }

    public function update(Request $request, $id)
    {
        $client = Client::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'profession' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:50',
            'description' => 'nullable',
            'status' => 'required|boolean',
        ]);

        $data = $request->only(['name','profession','description','status']);

        if ($request->hasFile('image')) {
            if ($client->image && file_exists(public_path('images/'.$client->image))) {
                unlink(public_path('images/'.$client->image));
            }
            $image = time().'_'.$request->image->getClientOriginalName();
            $request->image->move(public_path('images/clients'), $image);
            $data['image'] = 'clients/'.$image;
        }

        $client->update($data);
        return redirect()->route('admin.clients.index')->with('success', 'Client Updated Successfully');
    }

    public function destroy($id)
    {
        $client = Client::findOrFail($id);

        if ($client->image && file_exists(public_path('images/'.$client->image))) {
            unlink(public_path('images/'.$client->image));
        }

        $client->delete();
        return redirect()->route('admin.clients.index')->with('success', 'Client Deleted Successfully');
    }
}
