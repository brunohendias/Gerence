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
    public function check_if_success_edit_candidate()
    {
        $edit = [
            'telefone' => '37 999887766',
            'email' => 'editphpunit@phpunit.com',
            'cod_serie_v' => 3,
            'cod_atencao' => 5,
        ];

        $this->response = $this->put($this->url.'/1', $edit);

        $this->msg = 'Editamos esse candidato com sucesso.';

        $this->return_success();
    }

    /** @test */
    public function check_if_success_delete_candidate()
    {
        $this->response = $this->delete($this->url.'/2');

        $this->msg = 'Deletamos esse candidato com sucesso.';

        $this->return_success();
    }
}