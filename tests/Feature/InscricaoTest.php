<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class InscricaoTest extends TestCase
{
    private $url = '/api/v1/inscricao';// ROTA INSCRICAO
    
    private $arrayCheck = [
        'status' => 200,
        'success' => true
    ];// Array assertJson para teste de sucesso

    private $response;// Retorno da requisicao

    private $msg;// Mensagem retorno

    public function success_return() {
        $this->response->assertStatus(200)
            ->assertJson($this->arrayCheck)
            ->assertJsonPath('data.msg', $this->msg);
    }//Valida retorno com sucesso
    
    /**
     * A basic feature test example.
     * @test
     * @return void
     */
    public function if_success_get_subscriptions()
    {
        $this->response = $this->post($this->url.'/busca', ['cod_serie' => 1, 'cod_turno' => 1]);

        $this->msg = 'Inscrições buscadas com sucesso.';

        $this->success_return();
    }

    /** @test */
    public function if_success_get_specific_subscription()
    {
        $this->response = $this->get($this->url.'/1');

        $this->msg = 'Inscrição buscada com sucesso.';

        $this->success_return();
    }

    /*
    public function if_success_register_new_subscription()
    {
        $dados = [
            'nom_insc' => 'PHPUnit teste',
            'email' => 'phpunitteste@gmail.com',
            'telefone' => '31988887766',
            'cpf' => 11122233344,
            'cod_serie' => 1,
            'cod_turno' => 1
        ];
        
        $this->response = $this->post($this->url, $dados);

        $this->msg = 'A sua inscrição foi salva com sucesso. Aguarde enquanto analisamos ela.';
        $this->success_return();
    }*/
}