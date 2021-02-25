<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CandidatoTest extends TestCase
{

    private $url = '/api/v1/candidato/busca';

    /** @test */
    public function check_if_success_register_candidate() {

        $arrayRegister = [
            'nom_insc' => 'PHPUnit teste',
            'email' => 'phpunitteste@gmail.com',
            'telefone' => 37999887766,
            'cpf' => 11122233344,
            'cod_serie' => 1,
            'cod_turma' => 1,
            'cod_turno' => 1,
            'cod_atencao' => 1,
            'cod_prof' => 1
        ];

        $response = $this->post($this->url, $arrayRegister);

    }

    /**
     * A basic feature test example.
     * @test
     * @return void
     */
    public function check_if_success_get_candidate()
    {
        $arraySearch = [

        ];

        $response = $this->post($this->url.'/busca', $arraySearch);

        $response->assertStatus(200);
    }
}
