<?php

namespace App\Providers;

use App\Repositories\PostRepository;
use App\Repositories\UserRepository;
use App\Services\MailService;
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
        $this->app->singleton('\App\Repositories\PostRepository', PostRepository::class);
        $this->app->singleton('\App\Repositories\UserRepository', UserRepository::class);
        $this->app->singleton('\App\Services\MailService', MailService::class);
    }
}
