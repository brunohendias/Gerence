<?php

namespace App\Http\Controllers\Entidade;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Atencao;

class AtencaoController extends Controller
{
    private $atencao;

    public function __construct(Atencao $atencao)
    {
    	$this->atencao = $atencao;
    }

    public function index(Request $request)
    {
        try{
        	$atencoes = $this->atencao->select('codatencao', 'atencao')->get();

            if ($this->Objetovazio($atencoes)) {
                $msg = 'Não encontramos nenhuma atenção.';
                return $this->RespErrorNormal($msg, array('msg' => $msg), 500);
            }

            $msg = 'Atencões buscado com sucesso.';
            return $this->RespSuccess($msg, array('msg' => $msg, 'atencoes' => $atencoes));
        } catch (\Exception $e) {
            $msg = 'Houve um erro ao buscar as atenções.'.$e->getMessage();
            return $this->RespLogErro($e, $msg, 500);
        }
    }

    public function store(Request $request) {
        try {
            $novaAtencao = $this->atencao;
            $novaAtencao->nomprof = $request->atencao;
            $novaAtencao->save();

            $msg = 'Atenção cadastrada com sucesso.';
            return $this->RespSuccess($msg, array('msg' => $msg));
        } catch (\Exception $e) {
            $msg = 'Houve um erro ao cadastrar a atenção.'.$e->getMessage();
            return $this->RespLogErro($e, $msg, 500);
        }
    }

    public function destroy($id) {
        try {
            $atencao = $this->atencao->find($id);
            
            if ($this->Objetovazio($atencao)) {
                $msg = 'Não encontramos essa atenção.';
                return $this->RespErrorNormal($msg, array('msg' => $msg), 500);
            }

            $msg = 'Atenção deletada com sucesso.';
            return $this->RespSuccess($msg, array('msg' => $msg));
        } catch (\Exception $e) {
            $msg = 'Houve um erro ao deletar a atenção.'.$e->getMessage();
            return $this->RespLogErro($e, $msg, 500);
        }
    }
}
