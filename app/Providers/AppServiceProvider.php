<?php

namespace App\Providers;

use App\Services\RemovedorDeSerie;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(RemovedorDeSerie::class, function(){
            return new RemovedorDeSerie();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
