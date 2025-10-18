<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PackageQuery;
use Illuminate\Http\Request;

class PackageQueryController extends Controller
{
    public function index()
    {
        $queries = PackageQuery::with('package')->latest()->get();
        return view('admin.package_queries.index', compact('queries'));
    }

    public function updateStatus(Request $request, $id)
    {
        $query = PackageQuery::findOrFail($id);
        $query->status = $request->status;
        $query->save();

        return back()->with('success', 'Status updated successfully.');
    }

    public function show($id)
    {
        $query = PackageQuery::with('package')->findOrFail($id);
        return view('admin.package_queries.show', compact('query'));
    }
}
