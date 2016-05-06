<?php

namespace App\Providers;

use App\SwannPortal\Composers;
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
            'partials.carousel'
        ], Composers\SliderComposer::class);

        view()->composer([
            'partials.top-products'
        ], Composers\TopProductComposer::class);
        
        view()->composer([
            'partials.latest-updates'
        ], Composers\LatestUpdatesComposer::class);

        view()->composer([
            'partials.random-products',
            'partials.list-random-products'
        ], Composers\RandomProductComposer::class);
        
        view()->composer([
            'partials.commendation'
        ], Composers\CommendationComposer::class);

        view()->composer([
            'admin.layouts.content'
        ], Composers\StatusComposer::class);
        
        view()->composer([
            'admin.layouts.content',
            'layouts.app',
            'layouts.descriptive-content',
            'layouts.home-content'
        ], Composers\AdminComposer::class);

        view()->composer([
            'layouts.app',
            'layouts.descriptive-content',
            'layouts.home-content'
        ], Composers\CategoriesComposer::class);


        view()->composer([
            'layouts.app',
            'layouts.descriptive-content',
            'layouts.home-content'
        ], Composers\WarrantiesComposer::class);

        view()->composer([
            'admin.partials.tags.form'
        ], Composers\FormTagComposer::class);
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
