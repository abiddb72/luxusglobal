<?php

namespace App\Http\Controllers;

use App\Models\Visa;

class VisaController extends Controller
{
    // Show All Visa Countries
    public function index()
    {
        $visas = Visa::where('status', 1)->orderBy('country_title', 'asc')->get();
        return view('visas.index', compact('visas'));
    }

    // Show Single Country Visa Detail
    public function show(Visa $visa)
    {
        $all_visas = Visa::where('status', 1)->orderBy('country_title', 'asc')->get();
        return view('visas.show', compact('visa','all_visas'));
    }
}
