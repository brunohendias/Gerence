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

    public function aluno(): object
    {
    	return $this->hasOne(Aluno::class, 'cod_aluno', 'cod_aluno');
    }

    public function serie(): object
    {
        return $this->hasOne(Serie::class, 'cod_serie', 'cod_serie');
    }

    public function professor(): object
    {
        return $this->hasOne(Professor::class, 'cod_prof', 'cod_prof');
    }

    public function situacao(): object
    {
        return $this->hasOne(Situacao::class, 'cod_situacao', 'cod_situacao');
    }
}