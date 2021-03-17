<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Contracts\TurnoInterface;

class TurnoController extends Controller
{
    private $interface;

    public function __construct(TurnoInterface $interface)
    {
    	$this->interface = $interface;
    }

    public function index(Request $request)
    {
        $entidade = 'os turnos';
        try {
        	$dados = $this->interface->index($request);

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