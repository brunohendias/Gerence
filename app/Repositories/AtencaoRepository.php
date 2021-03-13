<?php

namespace App\Repositories;

use App\Repositories\Contracts\AtencaoInterface;
use App\Models\Atencao;

class AtencaoRepository implements AtencaoInterface
{
    private $model;

    public function __construct(Atencao $model)
    {
        $this->model = $model;
    }

    public function index(): object
    {
        return $this->model->select('cod_atencao', 'atencao')->get();
    }
}