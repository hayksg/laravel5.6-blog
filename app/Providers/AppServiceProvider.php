<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Greeting;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('layouts.sidebar', function($view){
            $view->with('archives', \App\Post::getArchives());
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        \App::bind('App\Billing\Stripe', function(){
            return new \App\Billing\Stripe(config('services.stripe.secret'));
        });

        // \App::bind(Greeting::class, function(){
        // $this->app->bind(Greeting::class, function(){
        $this->app->singleton(Greeting::class, function(){
            return new Greeting();
        });
    }
}
