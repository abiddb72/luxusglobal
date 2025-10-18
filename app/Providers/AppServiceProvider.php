<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Http\View\Composers\NavComposer;
use App\Http\View\Composers\SettingsComposer;
use App\Http\View\Composers\PagesComposer;
use App\Http\View\Composers\BanksComposer;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('*', NavComposer::class);
        View::composer('*', SettingsComposer::class);
        View::composer('*', PagesComposer::class);
        View::composer('*', BanksComposer::class);
    }
}
