<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use App\Models\Category;
use App\Models\Visa;

class NavComposer
{
    public function compose(View $view)
    {
        $visa_links = Visa::where('status', 1)->orderBy('country_title', 'asc')->limit(5)->get();

        $all_links = Category::where('status', 1)
                                    ->where('is_delete', 0)
                                    ->get();
        
        $package_links = Category::where('status', 1)
                                    ->where('type', 1) // Type = Package Tab
                                    ->where('is_delete', 0)
                                    ->orderBy('sort', 'ASC')
                                    ->get();

        $hajj_umrah_links = Category::where('status', 1)
                                    ->where('type', 2) // Type = Hajj Umrah Tab
                                    ->where('is_delete', 0)
                                    ->orderBy('sort', 'ASC')
                                    ->get();

        $events_links = Category::where('status', 1)
                                    ->where('type', 3) // Type = Event Tab
                                    ->where('is_delete', 0)
                                    ->orderBy('sort', 'ASC')
                                    ->get();

        $view->with([
            'all_links' => $all_links,
            'visa_links' => $visa_links,
            'package_links' => $package_links,
            'hajj_umrah_links' => $hajj_umrah_links,
            'events_links' => $events_links
        ]);
    }
}
