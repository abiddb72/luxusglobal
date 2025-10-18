<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PackageQuery;

class PackageQueryController extends Controller
{
    // STORE INQUIRY
    public function storeInquiry(Request $request)
    {
        $request->validate([
            'package_id' => 'required|exists:packages,id',
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'nullable|string',
            'travel_date' => 'required|date|after_or_equal:today',
            'no_of_person' => 'required|integer',
            'destination_address' => 'nullable|string',
            'message' => 'nullable|string',
        ]);

        PackageQuery::create([
            'package_id' => $request->package_id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'date' => $request->travel_date,
            'no_of_person' => $request->no_of_person,
            'destination_address' => $request->destination_address,
            'message' => $request->message,
            'status' => 0, // Default Pending
        ]);

        return back()->with('success', 'Inquiry Submitted Successfully! We will contact you soon.');
    }
}
