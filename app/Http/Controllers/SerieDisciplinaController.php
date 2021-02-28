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
		$entidade = 'as disciplinas dessa série';
    	try {
    		$cod_serie = $request->cod_serie;

    		$dados = $this->serieDisciplina
    			->select('cod_serie_disc','cod_disciplina')
    			->with('disciplina')
    			->where('cod_serie', $cod_serie)
    			->get();

			if ($this->Objetovazio($dados)) {
				$msg = $this->MsgNotFound('disciplina para essa série');
				return $this->RespErrorNormal($msg);
			}

			$msg = $this->MsgSearch($entidade);
			return $this->RespSuccess(array('msg' => $msg, 'dados' => $dados));
		} catch (\Exception $e) {
			$msg = $this->MsgSearch($entidade, 'error');
			return $this->RespLogErro($e, $msg);
		}
    }

    public function store(Request $request) {
		$entidade = 'essa disciplina nessa série';
    	try {
    		$novaDisciplina = $this->serieDisciplina;
    		$novaDisciplina->cod_serie = $request->cod_serie;
    		$novaDisciplina->cod_disciplina = $request->cod_disciplina;
    		$novaDisciplina->save();

    		$msg = $this->MsgRegister($entidade);
	    	return $this->RespSuccess(array('msg' => $msg));
        } catch (\Exception $e) {
            $msg = $this->MsgRegister($entidade, 'error');
			return $this->RespLogErro($e, $msg);
        }
    }

    public function destroy($id) {
		$entidade = 'essa disciplina dessa série';
    	try {
    		$dado = $this->serieDisciplina->find($id);

    		if ($this->Objetovazio($dado)) {
                $msg = $this->MsgNotFound('disciplina');
	    		return $this->RespErrorNormal($msg);
            }

    		$dado->delete();

    		$msg = $this->MsgDelete($entidade);
	    	return $this->RespSuccess(array('msg' => $msg));
        } catch (\Exception $e) {
            $msg = $this->MsgDelete($entidade, 'error');
            return $this->RespLogErro($e, $msg, 500);
        }
    }
}