<?php

namespace App\Repositories;

use App\Repositories\Contracts\TurnoInterface;
use App\Models\Turno;

class TurnoRepository implements TurnoInterface {

    private $model;

    public function __construct(Turno $model)
    {
        $this->model = $model;
    }

    public function index(object $request): object
    {
        $cod_turno = $request->cod_turno;
        
        return $this->model->select('cod_turno', 'turno')
            ->when($cod_turno, function(object $query) use ($cod_turno): object {
                return $query->where('cod_turno', $cod_turno);
            })
            ->get();
    }
}