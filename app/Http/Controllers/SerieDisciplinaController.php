<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vinculo\SerieDisciplina;

class SerieDisciplinaController extends Controller
{
    private $serieDisciplina;

    public function __construct(SerieDisciplina $serieDisciplina) {
    	$this->serieDisciplina = $serieDisciplina;
    }

    public function index(Request $request) {
    	try {
    		$codserie = $request->codserie;

    		$disciplinas = $this->serieDisciplina
    			->select('cod_serie_disc','coddisciplina')
    			->with('disciplina')
    			->where('codserie', $codserie)
    			->get();

    		if($this->ObjetoVasio($disciplinas)) {
    			$msg = 'Não encontramos nenhuma disciplina para essa serie.';
    			return $this->RespErrorNormal($msg, array('msg' => $msg), 400);
    		}

    		$msg = 'Encontramos as disicplinas dessa serie';
    		return $this->RespSuccess($msg, array('msg' => $msg, 'disciplinas' => $disciplinas));
    	} catch (\Exception $e) {
    		$msg = 'Houve um erro ao buscar as disciplinas dessa serie.';
    		return $this->RespLogErro($e, $msg, 500);
    	}
    }

    public function store(Request $request) {
    	try {
    		$novaDisciplina = $this->serieDisciplina;
    		$novaDisciplina->codserie = $request->codserie;
    		$novaDisciplina->coddisciplina = $request->coddisciplina;
    		$novaDisciplina->save();

    		$msg = 'Disciplina cadastrada com sucesso';
    		return $this->RespSuccess($msg, array('msg' => $msg, 'novadisciplina' => $novadisciplina));
    	} catch (\Exception $e) {
    		$msg = 'Houve um erro ao cadastrar essa disciplina para essa serie.';
    		return $this->RespLogErro($e, $msg, 500);
    	}
    }

    public function destroy($id) {
    	try {
    		$disciplina = $this->serieDisciplina->find($id);

    		if($this->ObjetoVasio($disciplina)) {
    			$msg = 'Não encontramos essa disciplina.';
    			return $this->RespErrorNormal($msg, array('msg' => $msg), 400);
    		}

    		$disciplina->delete();

    		$msg = 'Removemos essa disciplina dessa serie com sucesso.';
    		return $this->RespSuccess($msg, array('msg' => $msg));
    	} catch (\Exception $e) {
    		$msg = 'Houve um erro ao remover essa disciplina dessa serie.';
    		return $this->RespLogErro($e, $msg, 500);
    	}
    }
}