<?php

namespace App\Providers;

use App\Repositories\CustomerRepository;
use App\Repositories\DataBaseInterface;
use App\Repositories\OrderRepository;
use App\Repositories\PostRepository;
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
        $this->app->singleton(DataBaseInterface::class, PostRepository::class);
    }
}
