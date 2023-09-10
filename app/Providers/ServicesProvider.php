<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ServicesProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Interfaces\PostInterface',
            'App\Repositories\InvoiceRepository',
            'App\Repositories\ProductRepository',
            'App\Repositories\SectionRepository',
            'App\Repositories\INvoiceRepository'
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
