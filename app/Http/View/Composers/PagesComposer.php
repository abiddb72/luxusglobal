<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use App\Models\Page;

class PagesComposer
{
    public function compose(View $view)
    {
        $view->with('global_pages', Page::where('status', 1)->get());
    }
}
