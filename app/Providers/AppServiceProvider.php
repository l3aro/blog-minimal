<?php

namespace App\Providers;

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
        $this->app->singleton(\App\Enums\PostStatus::class);

        $this->app->bind(\App\Services\Contracts\PostService::class, \App\Services\Eloquent\PostServiceEloquent::class);
        $this->app->bind(\App\Services\Contracts\UserService::class, \App\Services\Eloquent\UserServiceEloquent::class);
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
