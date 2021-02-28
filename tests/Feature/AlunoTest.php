<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AlunoTest extends TestCase
{
    private $url = '/api/v1/aluno';

    /** @test */
    public function if_success_register_student()
    {
        $arraySearch = [
            //
        ];

        $candidato = $this->post('/api/v1/candidato/busca', $arraySearch);

        $candidato = $candidato['data']['candidatos'][0];

        $arrayRegister = [
            'nom_can' => $candidato['nom_can'],
            'email' => $candidato['email'],
            'telefone' => $candidato['telefone'],
            'cpf' => $candidato['cpf'],
            'cod_can' => $candidato['cod_can'],
            'cod_serie_v' => $candidato['cod_serie_v'],
    		'cod_atencao' => $candidato['cod_atencao'],
    		'cod_situacao' => 3,
            'num_matricula' => 13548774
        ];

        $this->response = $this->post($this->url, $arrayRegister);

        $this->msg = 'Aluno gerado com sucesso.';

        $this->return_success();
    }

    /** @test */
    public function if_success_get_student()
    {
        $arraySearch = [
            //
        ];

        $this->response = $this->post($this->url.'/busca', $arraySearch);

        $this->msg = 'Aluno buscado com sucesso.';

        $this->return_success();
    }
}