<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Career;
use Illuminate\Http\Request;

class CareerController extends Controller
{
    // Show All Career Applications
    public function index()
    {
        $careers = Career::latest()->get();
        return view('admin.careers.index', compact('careers'));
    }

    // Show Single Career Details
    public function show($id)
    {
        $career = Career::findOrFail($id);
        return view('admin.careers.show', compact('career'));
    }
}
