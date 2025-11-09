<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Gallery;

class ClientController extends Controller
{
    public function show($slug)
    {
        // Get client by slug
        $client = Client::where('slug', $slug)
                        ->where('status', 1)
                        ->firstOrFail();

        // Get all active clients (for sidebar or list)
        $clients = Client::where('status', 1)->latest()->get();

        // ✅ Get all gallery images for this client
        $gallery = Gallery::where('client_id', $client->id)->get();

        return view('clients.show', compact('client','clients','gallery'));
    }
}
