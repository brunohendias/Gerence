<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Situacao;

class SituacaoController extends Controller
{
    private $situacao;

    public function __construct(Situacao $situacao) {
    	$this->situacao = $situacao;
    }

    public function index() {
    	try {
    		$situacoes = $this->situacao
    			->select('codsituacao', 'situacao')
    			->get();

    		if ($this->Objetovazio($situacoes)) {
                $msg = 'Não encontramos nenhuma situacão.';
                return $this->RespErrorNormal($msg, array('msg' => $msg), 500);
            }

            $msg = 'Situação buscado com sucesso.';
            return $this->RespSuccess($msg, array('msg' => $msg, 'situacoes' => $situacoes));
    	} catch (\Exception $e) {
    		$msg = 'Houve um erro ao buscar as situações.';
    		return $this->RespLogErro($e, $msg, 500);
    	}
    }

    public function store(Request $request) {
    	try {

    		$novaSituacao = $this->situacao;
    		$novaSituacao->situacao = $request->situacao;
    		$novaSituacao->save();
    		
            $msg = 'Situação cadastrada com sucesso.';
            return $this->RespSuccess($msg, array('msg' => $msg, 'novasituacao' => $novaSituacao));
    	} catch (\Exception $e) {
    		$msg = 'Houve um erro ao cadastrar a situação.';
    		return $this->RespLogErro($e, $msg, 500);
    	}
    }

    public function destroy($id) {
        try {
            $situacao = $this->situacao->find($id);

            if($this->ObjetoVasio($situacao)) {
                $msg = 'Não encontramos essa situação.';
                return $this->RespErrorNormal($msg, array('msg' => $msg), 400);
            }

            $situacao->delete();

            $msg = 'Situação deletada com sucesso.';
            return $this->RespSuccess($msg, array('msg' => $msg));
        } catch (\Exception $e) {
            $msg = 'Houve um erro ao deletar essa situação.';
            return $this->RespLogErro($e, $msg, 500);
        }
    }
}
