<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Billing\Stripe;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('layouts.sidebar', function($view) {
            $archives = \App\Post::archives();
            $tags = \App\Tag::has('posts')->pluck('name');
            $view->with(compact('archives','tags'));
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

        // App::bind('App\Billing\Stripe', function() {
        //     return new  \App\Billing\Stripe(config('services.stripe.secret'));
        // });

        // \App::singleton('App\Billing\Stripe', function() {
        //     return new  \App\Billing\Stripe(config('services.stripe.secret'));
        // });

        //$this->app->singleton('Stripe::class', function($app) {
        //     $app->make('');    
            
        // $this->app->singleton('Stripe::class', function($app) {
        //     $app->make('');  
        //     return new  Stripe(config('services.stripe.secret'));
        // });
    }
}
