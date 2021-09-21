<?php

namespace Repositories;

use Contracts\AtencaoInterface;
use App\Models\Atencao;

class AtencaoRepository implements AtencaoInterface
{
    private object $model;

    public function __construct(Atencao $model)
    {
        $this->model = $model;
    }

    public function index(): object
    {
        return $this->model->select('cod_atencao', 'atencao')->get();
    }
}