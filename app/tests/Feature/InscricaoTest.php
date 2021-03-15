<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class InscricaoTest extends TestCase
{
    private $url = '/api/v1/inscricao';

    /** @test */
    public function if_success_get_subscriptions()
    {
        $arraySearch = [
            'cod_serie' => 1,
            'cod_turno' => 1
        ];

        $this->response = $this->post($this->url.'/busca', $arraySearch);

        $this->msg = 'Buscamos as inscrições com sucesso.';

        $this->return_success();
    }

    /** @test */
    public function if_success_get_specific_subscription()
    {
        $cod_serie = 1;

        $this->response = $this->get($this->url."/$cod_serie");

        $this->msg = 'Buscamos essa inscrição com sucesso.';

        $this->return_success()->assertJsonPath('data.dado.serie.cod_serie', $cod_serie);
    }

    /** @test */
    public function if_failed_get_specific_subscription()
    {
        $this->response = $this->get($this->url.'/a');

        $this->msg = 'Não encontramos nenhum(a) inscrição.';

        $this->return_not_found();
    }
}