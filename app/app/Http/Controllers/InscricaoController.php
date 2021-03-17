<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Contracts\InscricaoInterface;
use Maatwebsite\Excel\Facades\Excel;
use Relatorios\InscricaoExport;

class InscricaoController extends Controller
{
    protected $interface;

    public function __construct(InscricaoInterface $interface) {
        $this->interface = $interface;
    }

    public function index(Request $request)
    {
        $entidade = 'as inscrições';
        try{
            $request->nom_insc = strtoupper($this->removerAcentos($request->nom_insc));
            
            $dados = $this->interface->index($request);

            if ($this->Objetovazio($dados)) {
                $msg = $this->MsgNotFound('inscrição');
                return $this->RespErrorNormal($msg);
            }
    
            $msg = $this->MsgSearch($entidade);
	    	return $this->RespSuccess(array('msg' => $msg, 'dados' => $dados));
        } catch (\Exception $e) {
            $msg = $this->MsgSearch($entidade, 'error');
			return $this->RespLogErro($e, $msg);
        }
    }

    public function export()
    {
        return Excel::download(new InscricaoExport, 'inscricoes.xlsx' );
    }
}