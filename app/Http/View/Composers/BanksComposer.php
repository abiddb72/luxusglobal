<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use App\Models\Bank;

class BanksComposer
{
    public function compose(View $view)
    {
        $view->with('global_banks', Bank::where('status', 1)->get());
    }
}
