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
        $search = [
            //
        ];

        $inscricao = $this->post('/api/v1/inscricao/busca', $search);

        $inscricao = $inscricao['data']['dados'][0];

        $register = [
            'nom_insc' => $inscricao['nom_insc'],
            'email' => $inscricao['email'],
            'telefone' => $inscricao['telefone'],
            'cpf' => $inscricao['cpf'],
            'cod_serie_v' => 1,
            'cod_atencao' => $inscricao['cod_atencao'],
            'cod_insc' => $inscricao['cod_insc']
        ];

        $this->response = $this->post($this->url, $register);

        $this->msg = 'Cadastramos esse candidato com sucesso.';

        $this->return_success();

    }

    /** @test */
    public function check_if_success_get_candidate()
    {
        $search = [
            //
        ];

        $this->response = $this->post($this->url.'/busca', $search);

        $this->msg = 'Buscamos os candidatos com sucesso.';

        $this->return_success();
    }

    /** @test */
    public function check_if_failed_delete_candidate_student()
    {
        $this->response = $this->delete($this->url.'/1');

        $this->msg = 'Não podemos deletar um candidato que se tornou um aluno.';

        $this->return_failed();
    }
}