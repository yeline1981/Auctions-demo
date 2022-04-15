<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ImageUploaderServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ImagenStoreInterface::class, ImagenStoreService::class);
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
