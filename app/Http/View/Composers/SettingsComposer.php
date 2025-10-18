<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use App\Models\Setting;

class SettingsComposer
{
    public function compose(View $view)
    {
        $view->with('global_settings', Setting::first());
    }
}
