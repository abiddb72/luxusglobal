<?php

namespace App\Http\Controllers;

use App\Models\Career;
use Illuminate\Http\Request;

class CareerController extends Controller
{
    public function create()
    {
        return view('career');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'email'       => 'required|email',
            'description' => 'nullable|string',
            'resume'      => 'required|mimes:pdf,doc,docx|max:300',
        ]);

        // File Upload
        $fileName = time() . '.' . $request->resume->getClientOriginalExtension();
        $request->resume->move(public_path('resumes'), $fileName);

        // Save to DB
        Career::create([
            'name'        => $request->name,
            'email'       => $request->email,
            'description' => $request->description,
            'resume'      => $fileName,
        ]);

        return back()->with('success', 'Application Submitted Successfully!');
    }
}
