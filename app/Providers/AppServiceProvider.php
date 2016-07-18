<?php

namespace App\Providers;

use App\Repositories\CustomerRepository\CustomerRepository;
use App\Repositories\OrderRepository\OrderRepository;
use App\Repositories\PostRepository\PostRepository;
use App\Repositories\UserRepository;
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
        $this->app->singleton('\App\Repositories\CustomerRepository', CustomerRepository::class);
        $this->app->singleton('\App\Repositories\OrderRepository', OrderRepository::class);
        $this->app->singleton('\App\Repositories\PostRepository', PostRepository::class);
        $this->app->singleton('\App\Repositories\UserRepository', UserRepository\UserRepository::class);
    }
}
