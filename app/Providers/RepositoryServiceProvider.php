<?php

namespace App\Providers;

use App\Repositories\Contracts\BasicRepositoryInterface;
use App\Repositories\Contracts\SignupRepositoryInterface;
use App\Repositories\Contracts\UserRepositoryInterface;
use App\Repositories\SignupRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(BasicRepositoryInterface::class, BaseRepository::class);
        $this->app->bind(SignupRepositoryInterface::class, SignupRepository::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
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
