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
        view()->composer(['partials.carousel'], SwannPortal\SliderComposer::class);
        view()->composer(['partials.top-products'], SwannPortal\TopProductComposer::class);
        view()->composer(['partials.latest-updates'], SwannPortal\LatestUpdatesComposer::class);
        view()->composer(['partials.random-products', 'partials.list-random-products'], SwannPortal\RandomProductComposer::class);

        view()->composer(['admin.layouts.content'], SwannPortal\StatusComposer::class);
        view()->composer([
            'admin.layouts.content',
            'layouts.app',
            'layouts.descriptive-content',
            'layouts.home-content'
        ], SwannPortal\AdminComposer::class);

        view()->composer([
            'layouts.app',
            'layouts.descriptive-content',
            'layouts.home-content'
        ], SwannPortal\CategoriesComposer::class);


        view()->composer([
            'layouts.app',
            'layouts.descriptive-content',
            'layouts.home-content'
        ], SwannPortal\WarrantiesComposer::class);

        view()->composer(['admin.partials.tags.form'], SwannPortal\FormTagComposer::class);
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
