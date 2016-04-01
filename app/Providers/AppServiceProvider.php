<?php

namespace App\Providers;

use App\SwannPortal;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer([
            'admin.layouts.content',
            'layouts.app',
            'layouts.descriptive-content',
            'layouts.home-content'
        ], SwannPortal\AdminComposer::class);

        view()->composer(['admin.layouts.content'], SwannPortal\StatusComposer::class);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
