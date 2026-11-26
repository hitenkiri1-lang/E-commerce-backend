<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Laravel\Passport\Passport;

class AppServiceProvider extends ServiceProvider
{
    protected $polices =[
        'App\Models\Model' => 'App\Polices\ModelPolicy',
    ];
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
        $this->registerPolices();
        if(! $this->app->routeAreCached())
        {
            Passport::routes();
        } 
    }
}
