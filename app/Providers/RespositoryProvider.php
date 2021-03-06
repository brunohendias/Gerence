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
        $this->app->bind (
            'App\Repositories\Contracts\SerieInterface',
            'App\Repositories\SerieRepository',
        );

        $this->app->bind (
            'App\Repositories\Contracts\TurnoInterface',
            'App\Repositories\TurnoRepository'
        );

        $this->app->bind (
            'App\Repositories\Contracts\TurmaInterface',
            'App\Repositories\TurmaRepository'
        );

        $this->app->bind (
            'App\Repositories\Contracts\SituacaoInterface',
            'App\Repositories\SituacaoRepository'
        );

        $this->app->bind (
            'App\Repositories\Contracts\SerieVinculoInterface',
            'App\Repositories\SerieVinculoRepository'
        );

        $this->app->bind (
            'App\Repositories\Contracts\SerieDisciplinaInterface',
            'App\Repositories\SerieDisciplinaRepository'
        );

        $this->app->bind (
            'App\Repositories\Contracts\ProfessorInterface',
            'App\Repositories\ProfessorRepository'
        );

        $this->app->bind (
            'App\Repositories\Contracts\ProfessorVinculoInterface',
            'App\Repositories\ProfessorVinculoRepository'
        );

        $this->app->bind (
            'App\Repositories\Contracts\InscricaoInterface',
            'App\Repositories\InscricaoRepository'
        );

        $this->app->bind (
            'App\Repositories\Contracts\CandidatoInterface',
            'App\Repositories\CandidatoRepository'
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
