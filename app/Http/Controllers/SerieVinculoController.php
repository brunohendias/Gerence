<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vinculo\SerieVinculo;

class SerieVinculoController extends Controller
{
    private $serieVinculo;

    public function __construct(SerieVinculo $serieVinculo)
    {
    	$this->serieVinculo = $serieVinculo;
    }

    public function index(Request $request)
    {
        try {
            $cod_serie = $request->cod_serie;
            $cod_turno = $request->cod_turno;
            $cod_turma = $request->cod_turma;
            $cod_prof = $request->cod_prof;

            $dadosseries = $this->serieVinculo
                ->when($cod_serie, function ($query) use ($cod_serie) {
                    return $query->where('cod_serie', $cod_serie);
                })
                ->when($cod_turno, function ($query) use ($cod_turno) {
                    return $query->where('cod_turno', $cod_turno);
                })
                ->when($cod_turma, function ($query) use ($cod_turma) {
                    return $query->where('cod_turma', $cod_turma);
                })
                ->when($cod_prof, function ($query) use ($cod_prof) {
                    return $query->where('cod_prof', $cod_prof);
                })
                ->with('serie')
                ->with('turno')
                ->with('turma')
                ->with('professor')
                ->get();

            if ($this->Objetovazio($dadosseries)) {
                $msg = 'Não encontramos nenhuma série com essas informações.';
                return $this->RespErrorNormal($msg, array('msg' => $msg), 500);
            }

            $msg = 'Encontramos as séries com essas informações.';
            return $this->RespSuccess($msg, array('msg' => $msg, 'dadosseries' => $dadosseries));
        } catch (\Exception $e) {
            $msg = 'Houve um erro ao buscar as séries com essas informações.'.$e->getMessage();
            return $this->RespLogErro($e, $msg, 500);
        }
    }

    public function store(Request $request) {
        try {
            $cod_serie = $request->cod_serie;
            $cod_turno = $request->cod_turno;
            $cod_turma = $request->cod_turma;
            $cod_prof = $request->cod_prof;

            $serie = $this->serieVinculo
                ->where('cod_serie',$cod_serie)
                ->where('cod_turno',$cod_turno)
                ->where('cod_turma',$cod_turma)
                ->when($cod_prof, function ($query) use ($cod_prof) {
                    return $query->where('cod_prof', $cod_prof);
                })
                ->count();
            
            if ($this->existeRegistro($serie)) {
                $msg = 'Essa série já esta cadastrada com essas informações.';
                return $this->RespErrorNormal($msg, array('msg' => $msg), 500);
            }

            $this->serieVinculo->cod_serie = $cod_serie;
            $this->serieVinculo->cod_turno = $cod_turno;
            $this->serieVinculo->cod_turma = $cod_turma;
            $this->serieVinculo->cod_prof = $cod_prof;
            $this->serieVinculo->limite_alunos = $request->limite_alunos;
            $this->serieVinculo->save();

            $msg = 'Cadastramos essa série com sucesso.';
            return $this->RespSuccess($msg, array('msg' => $msg));
        } catch (\Exception $e) {
            $msg = 'Houve um erro ao cadastrar essa série.'.$e->getMessage();
            return $this->RespLogErro($e, $msg, 500);
        }
    }

    public function update(Request $request, $cod_serie_v) {
        try {
            $dadosSerie = $this->serieVinculo->select('cod_serie_v','cod_turno','cod_turma','cod_prof','limite_alunos')
                ->where('cod_serie_v', $cod_serie_v)
                ->first();

            if ($this->Objetovazio($dadosSerie)) {
                $msg = 'Não encontramos as informações dessa série.';
                return $this->RespErrorNormal($msg, array('msg' => $msg), 500);
            }

            $dados = $request->only('cod_turno','cod_turma','cod_prof','limite_alunos');
            $dadosSerie->update($dados);

            $msg = 'Alteramos as informações dessa série com sucesso';
            return $this->RespSuccess($msg, array('msg' => $msg));
        } catch (\Exception $e) {
            $msg = 'Houve um erro ao editar as informações dessa série.'.$e->getMessage();
            return $this->RespLogErro($e, $msg, 500);
        }
    }
}