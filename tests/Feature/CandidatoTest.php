<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CandidatoTest extends TestCase
{    
    private $url = '/api/v1/candidato';

    /** @test */
    public function check_if_success_register_candidate() 
    {
        $arraySearch = [
            //
        ];

        $inscricao = $this->post('/api/v1/inscricao/busca', $arraySearch);

        $inscricao = $inscricao['data']['inscricoes'][0];

        $arrayRegister = [
            'nom_insc' => $inscricao['nom_insc'],
            'email' => $inscricao['email'],
            'telefone' => $inscricao['telefone'],
            'cpf' => $inscricao['cpf'],
            'cod_serie_v' => 1,
            'cod_atencao' => $inscricao['cod_atencao'],
            'cod_insc' => $inscricao['cod_insc']
        ];

        $this->response = $this->post($this->url, $arrayRegister);

        $this->msg = 'Candidato cadastrado com sucesso.';

        $this->return_success();

    }

    /** @test */
    public function check_if_success_get_candidate()
    {
        $arraySearch = [
            //
        ];

        $this->response = $this->post($this->url.'/busca', $arraySearch);

        $this->msg = 'Candidatos buscado com sucesso.';

        $this->return_success();
    }
}