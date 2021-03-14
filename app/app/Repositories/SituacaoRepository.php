<?php

namespace App\Repositories;

use App\Repositories\Contracts\SituacaoInterface;
use App\Models\Situacao;

class SituacaoRepository implements SituacaoInterface {
    
    private $model;

    public function __construct(Situacao $model)
    {
        $this->model = $model;
    }
    
    public function index($request) {
        $cod_situacao = $request->cod_situacao;
        
        return $this->model->select('cod_situacao', 'situacao')
            ->when($cod_situacao, function ($query) use ($cod_situacao) {
                return $query->where('cod_situacao', $cod_situacao);
            })->get();
    }

    public function store($request) {
        $this->model->situacao = $request->situacao;
        $this->model->save();

        return $this->model;
    }

    public function destroy($id) {
        return $this->model->delete($id);
    }
}