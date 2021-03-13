<?php

namespace App\Repositories;

use App\Repositories\Contracts\InscricaoInterface;
use App\Models\Inscricao;

class InscricaoRepository implements InscricaoInterface
{
    private $model;

    public function __construct(Inscricao $model)
    {
        $this->model = $model;
    }

    public function index(object $request): object
    {
        $cpf = $request->cpf;
        $cod_serie = $request->cod_serie;
        $cod_turno = $request->cod_turno;
        $nom_insc = \Str::upper($request->nom_insc);

        return $this->model->SelectInscricao()
            ->when($nom_insc, function (object $query) use ($nom_insc): object {
                return $query->whereRaw("upper(nom_insc) like '%$nom_insc%'");
            })
            ->when($cpf, function (object $query) use ($cpf): object {
                return $query->where('cpf', $cpf);
            })
            ->when($cod_serie, function (object $query) use ($cod_serie): object {
                return $query->where('cod_serie', $cod_serie);
            })
            ->when($cod_turno, function (object $query) use ($cod_turno): object {
                return $query->where('cod_turno', $cod_turno);
            })
            ->with('serie')
            ->with('turno')
            ->get();
    }
}