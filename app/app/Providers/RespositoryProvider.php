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
        $this->app->bind('Contracts\SerieInterface', 'Repositories\SerieRepository');

        $this->app->bind('Contracts\TurnoInterface','Repositories\TurnoRepository');

        $this->app->bind('Contracts\TurmaInterface','Repositories\TurmaRepository');

        $this->app->bind('Contracts\SituacaoInterface','Repositories\SituacaoRepository');

        $this->app->bind('Contracts\AtencaoInterface','Repositories\AtencaoRepository');

        $this->app->bind('Contracts\SerieVinculoInterface','Repositories\SerieVinculoRepository');

        $this->app->bind('Contracts\SerieDisciplinaInterface','Repositories\SerieDisciplinaRepository');

        $this->app->bind('Contracts\ProfessorInterface','Repositories\ProfessorRepository');

        $this->app->bind('Contracts\ProfessorVinculoInterface','Repositories\ProfessorVinculoRepository');

        $this->app->bind('Contracts\InscricaoInterface','Repositories\InscricaoRepository');

        $this->app->bind('Contracts\CandidatoInterface','Repositories\CandidatoRepository');

        $this->app->bind('Contracts\AlunoInterface','Repositories\AlunoRepository');
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
