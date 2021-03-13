<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Contracts\TurmaInterface;

class TurmaController extends Controller
{
   	private object $interface;

    public function __construct(TurmaInterface $interface)
    {
    	$this->interface = $interface;
    }

    public function index(Request $request): object
    {
        $entidade = 'as turmas';
        try{
    		$dados = $this->interface->index($request);

            if ($this->Objetovazio($dados)) {
                $msg = $this->MsgNotFound('turma');
                return $this->RespErrorNormal($msg);
            }

            $msg = $this->MsgSearch($entidade);
            return $this->RespSuccess(array('msg' => $msg, 'dados' => $dados));
        } catch (\Exception $exception) {
            $msg = $this->MsgSearch($entidade, 'error');
            return $this->RespLogErro($exception, $msg);
        }
    }
}