<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class HelperServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        // http://stackoverflow.com/questions/28290332/best-practices-for-custom-helpers-on-laravel-5
        foreach (glob(app_path().'/Helpers/*.php') as $filename)
        {
            require_once($filename);
        }
    }
}
