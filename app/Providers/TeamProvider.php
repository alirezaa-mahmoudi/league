<?php

namespace App\Providers;

use App\Services\v1\Team;
use Illuminate\Support\ServiceProvider;

class TeamProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(Team::class , function($app){
            return new Team();
        });
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
