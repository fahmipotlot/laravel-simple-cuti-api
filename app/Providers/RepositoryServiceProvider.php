<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\CutiRepositoryInterface;
use App\Repositories\CutiRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(CutiRepositoryInterface::class, CutiRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
