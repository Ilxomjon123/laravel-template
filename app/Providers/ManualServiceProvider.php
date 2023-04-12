<?php

namespace App\Providers;

use App\Services\Contracts\ExampleServiceInterface;
use App\Services\ExampleService;
use Illuminate\Support\ServiceProvider;

class ManualServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->singleton(ExampleServiceInterface::class, ExampleService::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(): void
    {
        //
    }
}
