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
}