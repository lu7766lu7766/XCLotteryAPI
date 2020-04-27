<?php

namespace App\Providers;

use Illuminate\Contracts\Filesystem\Cloud;
use Illuminate\Contracts\Foundation\Application;
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
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(Cloud::class, function (Application $app) {
            return $app->environment(['production', 'testing']) ? \Storage::disk('s3') : \Storage::disk('public');
        });
    }
}
