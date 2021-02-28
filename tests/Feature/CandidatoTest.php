<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CandidatoTest extends TestCase
{

    private $url = '/api/v1/candidato';

    /** @test */
    public function check_if_success_register_candidate() {

        $arrayRegister = [
            'nom_insc' => 'PHPUnit teste',
            'email' => 'phpunitteste@gmail.com',
            'telefone' => 37999887766,
            'cpf' => 11122233344,
            'cod_serie_v' => 1,
            'cod_atencao' => 1,
            'cod_insc' => 1
        ];

        $this->response = $this->post($this->url, $arrayRegister);

        $this->msg = 'Candidato cadastrado com sucesso.';

        $this->return_success();

    }

    /**
     * A basic feature test example.
     * @test
     * @return void
     */
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
