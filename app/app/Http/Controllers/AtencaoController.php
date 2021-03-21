<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Contracts\AtencaoInterface;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Relatorios\AtencaoExport;

class AtencaoController extends Controller
{
    private object $interface;

    public function __construct(AtencaoInterface $interface)
    {
    	$this->interface = $interface;
    }

    public function index(): object
    {
        $entidade = 'as atenções';
        try{
        	$dados = $this->interface->index();

            if ($this->Objetovazio($dados)) {
                $msg = $this->MsgNotFound('atenção');
	    		return $this->RespErrorNormal($msg);
            }

			$msg = $this->MsgSearch($entidade);
	    	return $this->RespSuccess(array('msg' => $msg, 'dados' => $dados));
        } catch (\Exception $exception) {
            $msg = $this->MsgSearch($entidade, 'error');
			return $this->RespLogErro($exception, $msg);
        }
    }

    public function export() 
    {
        return Excel::download(new AtencaoExport, 'atencao.xlsx');
    }
}
