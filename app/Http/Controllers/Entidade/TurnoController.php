<?php

namespace App\Http\Controllers\Entidade;

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
        try{
            $codturno = $request->codturno;

        	$turnos = $this->turno
                ->select('codturno', 'turno')
                ->when($codturno, function($query) use ($codturno) {
                    return $query->where('codturno', $codturno);
                })
        		->get();

            if ($this->Objetovazio($turnos)) {
                $msg = 'Não encontramos nenhum turno.';
                return $this->RespErrorNormal($msg, array('msg' => $msg), 500);
            }

        	$msg = 'Turnos buscado com sucesso';
            return $this->RespSuccess($msg, array('msg' => $msg, 'turnos' => $turnos));
        } catch (\Exception $e) {
            $msg = 'Houve um erro ao buscar os turnos.';
            return $this->RespLogErro($e, $msg, 500);
        }
    }
}