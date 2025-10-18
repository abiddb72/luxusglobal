<?php

namespace App\Http\Controllers;

use App\Models\Newsletter;
use Illuminate\Http\Request;
use App\Mail\NewsletterMail;
use Illuminate\Support\Facades\Mail;

class NewsletterController extends Controller
{
    // Frontend Store
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:newsletters,email'
        ]);

        Newsletter::create([
            'email' => $request->email
        ]);

        Mail::to('admin@gmail.com')->send(new NewsletterMail($request->email));

        return back()->with('success', 'Thank you for subscribing!');
    }

    // Admin Index
    public function index()
    {
        $newsletters = Newsletter::latest()->get();
        return view('admin.newsletter.index', compact('newsletters'));
    }
}
