<?php

namespace App\Http\Controllers\Entidade;

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
            $nominsc = strtoupper($this->removerAcentos($request->nominsc));
            $cpf = $request->cpf;
            $codserie = $request->codserie;
            $codturno = $request->codturno;

            $inscricoes = $this->inscricao
                ->SelectInscricao()
                ->when($nominsc, function ($query) use ($nominsc) {
                    return $query->whereRaw("upper(nominsc) like '%$nominsc%'");
                })
                ->when($cpf, function ($query) use ($cpf) {
                    return $query->where('cpf', $cpf);
                })
                ->when($codserie, function ($query) use ($codserie) {
                    return $query->where('codserie', $codserie);
                })
                ->when($codturno, function ($query) use ($codturno) {
                    return $query->where('codturno', $codturno);
                })
                ->with('serie')
                ->with('turno')
                ->where('ind_candidato', 'N')
                ->get();

            if ($this->Objetovazio($inscricoes)) {
                $msg = 'Não encontramos nenhuma inscrição.';
                return $this->RespErrorNormal($msg, array('msg' => $msg), 500);
            }

            $msg = 'Inscrições buscado com sucesso.';
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

            $msg = 'Inscrição buscado com sucesso.';
            return $this->RespSuccess($msg, array('msg' => $msg, 'inscricao' => $inscricao));
        } catch (\Exception $e) {
            $msg = 'Houve um erro ao buscar a inscrição.'.$e->getMessage();
            return $this->RespLogErro($e, $msg, 500);
        }
    }

    public function store(Request $request) {
        try{

            $novaInscricao = $this->inscricao;
            $novaInscricao->nominsc = $request->nominsc;
            $novaInscricao->email = $request->email;
            $novaInscricao->telefone = $request->telefone;
            $novaInscricao->cpf = $request->cpf;
            $novaInscricao->codserie = $request->codserie;
            $novaInscricao->codturno = $request->codturno;
            $novaInscricao->save();

            $msg = 'A sua inscrição foi salva com sucesso. Aguarde enquanto analizamos ela.';
            return $this->RespSuccess($msg, array('msg' => $msg));
        } catch (\Exception $e) {
            $msg = 'Houve um erro ao salva a sua inscrição. Por favor entre em contato com a gente pelo numero (037) 9 9999-8888'.$e->getMessage();
            return $this->RespLogErro($e, $msg, 500);
        }
    }

    public function update(Request $request, $id)
    {
        try{
            $inscricao = $this->inscricao->find($id);

            if ($this->Objetovazio($inscricao)) {
                $msg = 'Não encontramos nenhuma inscrição.';
                return $this->RespErrorNormal($msg, array('msg' => $msg), 500);
            }

            $inscricaoData['nominsc'] = $request->nominsc;
            $inscricaoData['email'] = $request->email;
            $inscricaoData['telefone'] = $request->telefone;
            $inscricaoData['cpf'] = $request->cpf;
            $inscricaoData['codserie'] = $request->codserie;
            $inscricaoData['codturno'] = $request->codturno;

            $this->inscricao->update($inscricaoData);

            $msg = 'Essa inscrição foi atualizada com sucesso.';
            return $this->RespSuccess($msg, array('msg' => $msg, 'inscricao' => $inscricao));
        } catch (\Exception $e) {
            $msg = 'Houve um erro ao atualizar a inscrição. Por favor entre em contato com a gente pelo numero (037) 9 9999-8888'.$e->getMessage();
            return $this->RespLogErro($e, $msg, 500);
        }
    }}
