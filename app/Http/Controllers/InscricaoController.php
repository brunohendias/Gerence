<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Inscricao;

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
        try{
            $nom_insc = strtoupper($this->removerAcentos($request->nom_insc));
            $cpf = $request->cpf;
            $cod_serie = $request->cod_serie;
            $cod_turno = $request->cod_turno;

            $inscricoes = $this->inscricao
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

            if ($this->Objetovazio($inscricoes)) {
                $msg = 'Não encontramos nenhuma inscrição.';
                return $this->RespErrorNormal($msg, array('msg' => $msg), 500);
            }

            $msg = 'Inscrições buscadas com sucesso.';
            return $this->RespSuccess($msg, array('msg' => $msg, 'inscricoes' => $inscricoes));
        } catch (\Exception $e) {
            $msg = 'Houve um erro ao buscar as inscrições.'.$e->getMessage();
            return $this->RespLogErro($e, $msg, 500);
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
        try{
            $inscricao = $this->inscricao
                ->SelectInscricao()
                ->with('serie')
                ->with('turno')
                ->find($id);

            if ($this->Objetovazio($inscricao)) {
                $msg = 'Não encontramos nenhuma inscrição.';
                return $this->RespErrorNormal($msg, array('msg' => $msg), 500);
            }

            $msg = 'Inscrição buscada com sucesso.';
            return $this->RespSuccess($msg, array('msg' => $msg, 'inscricao' => $inscricao));
        } catch (\Exception $e) {
            $msg = 'Houve um erro ao buscar a inscrição.';
            return $this->RespLogErro($e, $msg, 500);
        }
    }

}