<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\Visa;
use App\Models\Contact;
use App\Models\Newsletter;
use App\Models\Career;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'total_packages'   => Package::count(),
            'total_visas'      => Visa::count(),
            'total_contacts'   => Contact::count(),
            'total_newsletter' => Newsletter::count(),
        ];

        $latest_careers = Career::latest()->take(5)->get();


        return view('admin.dashboard', compact('data', 'latest_careers'));

    }
}
