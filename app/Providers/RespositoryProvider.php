<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RespositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Repositories\Contracts\SerieInterface',
            'App\Repositories\SerieRepository',
        );

        $this->app->bind(
            'App\Repositories\Contracts\TurnoInterface',
            'App\Repositories\TurnoRepository'
        );

        $this->app->bind(
            'App\Repositories\Contracts\TurmaInterface',
            'App\Repositories\TurmaRepository'
        );
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
