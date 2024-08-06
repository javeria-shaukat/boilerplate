<?php

namespace Laravel\BoilerplatePackage;

use Illuminate\Support\ServiceProvider;

class BoilerplateServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // Register any bindings here
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // Perform post-registration booting of services.
        // Publish configuration files, migrations, etc.
    }
}
