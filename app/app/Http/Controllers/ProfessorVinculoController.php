<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Contracts\ProfessorVinculoInterface;

class ProfessorVinculoController extends Controller
{
    private $interface;

	public function __construct(ProfessorVinculoInterface $interface) {
		$this->interface = $interface;
	}

	public function index()
    {
        $entidade = 'os professores';
        try{
            $dados = $this->interface->index();

            if ($this->Objetovazio($dados)) {
                $msg = $this->MsgNotFound('dado para esse professor');
                return $this->RespErrorNormal($msg);
            }

            $msg = $this->MsgSearch($entidade);
            return $this->RespSuccess(array('msg' => $msg, 'dados' => $dados));
        } catch (\Exception $e) {
            $msg = $this->MsgSearch($entidade, 'error');
            return $this->RespLogErro($e, $msg);
        }
    }
}