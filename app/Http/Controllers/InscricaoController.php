<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Inscricao;
use Resources\Lang\messages;

class InscricaoController extends Controller
{
    protected $inscricao;

    public function __construct(Inscricao $inscricao) {
        $this->inscricao = $inscricao;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        $entidade = 'as inscrições';
        try{
            $nom_insc = strtoupper($this->removerAcentos($request->nom_insc));
            $cpf = $request->cpf;
            $cod_serie = $request->cod_serie;
            $cod_turno = $request->cod_turno;

            $dados = $this->inscricao
                ->SelectInscricao()
                ->when($nom_insc, function ($query) use ($nom_insc) {
                    return $query->whereRaw("upper(nom_insc) like '%$nom_insc%'");
                })
                ->when($cpf, function ($query) use ($cpf) {
                    return $query->where('cpf', $cpf);
                })
                ->when($cod_serie, function ($query) use ($cod_serie) {
                    return $query->where('cod_serie', $cod_serie);
                })
                ->when($cod_turno, function ($query) use ($cod_turno) {
                    return $query->where('cod_turno', $cod_turno);
                })
                ->with('serie')
                ->with('turno')
                ->get();

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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $entidade = 'essa inscrição';
        try{
            $dado = $this->inscricao->SelectInscricao()
                ->with('serie')
                ->with('turno')
                ->find($id);

            if ($this->Objetovazio($dado)) {
                $msg = $this->MsgNotFound('candidato');
                return $this->RespErrorNormal($msg);
            }

            $msg = $this->MsgSearch($entidade);
	    	return $this->RespSuccess(array('msg' => $msg, 'dado' => $dado));
        } catch (\Exception $e) {
            $msg = $this->MsgSearch($entidade, 'error');
			return $this->RespLogErro($e, $msg);
        }
    }

}