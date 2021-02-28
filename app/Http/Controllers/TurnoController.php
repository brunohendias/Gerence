<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Turno;

class TurnoController extends Controller
{
    private $turno;

    public function __construct(Turno $turno)
    {
    	$this->turno = $turno;
    }

    public function index(Request $request)
    {
        $entidade = 'os turnos';
        try {
            $cod_turno = $request->cod_turno;

        	$dados = $this->turno->select('cod_turno', 'turno')
                ->when($cod_turno, function($query) use ($cod_turno) {
                    return $query->where('cod_turno', $cod_turno);
                })
        		->get();

            if ($this->Objetovazio($dados)) {
                $msg = $this->MsgNotFound('turno');
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