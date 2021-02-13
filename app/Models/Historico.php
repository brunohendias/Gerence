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
    protected $primaryKey = 'codhistorico';

    public function aluno() {
    	return $this->hasOne(Aluno::class, 'codaluno', 'codaluno')->select('codaluno','nomaluno');
    }

    public function serie()
    {
        return $this->hasOne(Serie::class, 'codserie', 'codserie')->select('codserie', 'serie');
    }

    public function professor()
    {
        return $this->hasOne(Professor::class, 'codprof', 'codprof')->select('codprof', 'nomprof');
    }

    public function situacao()
    {
        return $this->hasOne(Situacao::class, 'codsituacao', 'codsituacao')->select('codsituacao', 'situacao');
    }
}