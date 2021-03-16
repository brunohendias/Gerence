<?php

namespace Repositories;

use Contracts\InscricaoInterface;
use App\Models\Inscricao;

class InscricaoRepository implements InscricaoInterface
{
    private $model;

    public function __construct(Inscricao $model)
    {
        $this->model = $model;
    }

    public function index($request)
    {
        $cpf = $request->cpf;
        $cod_serie = $request->cod_serie;
        $cod_turno = $request->cod_turno;
        $nom_insc = $request->nom_insc;

        return $this->model->SelectInscricao()
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
    }
}