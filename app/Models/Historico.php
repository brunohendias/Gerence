<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Aluno;
use App\Models\Serie;
use App\Models\Professor;
use App\Models\Situacao;

class Historico extends Model
{
	protected $connection = 'mysql';
    protected $table = 'historico';
    protected $primaryKey = 'cod_historico';

    public function aluno() {
    	return $this->hasOne(Aluno::class, 'cod_aluno', 'cod_aluno')->select('cod_aluno','nom_aluno');
    }

    public function serie()
    {
        return $this->hasOne(Serie::class, 'cod_serie', 'cod_serie')->select('cod_serie', 'serie');
    }

    public function professor()
    {
        return $this->hasOne(Professor::class, 'cod_prof', 'cod_prof')->select('cod_prof', 'nom_prof');
    }

    public function situacao()
    {
        return $this->hasOne(Situacao::class, 'cod_situacao', 'cod_situacao')->select('cod_situacao', 'situacao');
    }
}