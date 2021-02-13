<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Serie;
use App\Models\Turma;
use App\Models\Turno;
use App\Models\Atencao;
use App\Models\Professor;
use App\Models\Candidato;
use App\Models\Situacao;

class Aluno extends Model
{
	protected $connection = 'mysql';
    protected $table = 'aluno';
    protected $primaryKey = 'codaluno';

    public function scopeSelectAluno($builder) {
        return $builder->select('codaluno','nomaluno','email','telefone','cpf','num_matricula',
                'codserie','codturno','codturma','codprof','codatencao','codsituacao');
    }

    public function candidato() {
    	return $this->hasOne(Candidato::class, 'codcan', 'codcan')->select('codcan', 'nomcan');
    }
    
    public function serie()
    {
        return $this->hasOne(Serie::class, 'codserie', 'codserie')->select('codserie', 'serie');
    }

    public function turma()
    {
        return $this->hasOne(Turma::class, 'codturma', 'codturma')->select('codturma', 'turma');
    }

    public function turno()
    {
        return $this->hasOne(Turno::class, 'codturno', 'codturno')->select('codturno', 'turno');
    }

    public function atencao()
    {
        return $this->hasOne(Atencao::class, 'codatencao', 'codatencao')->select('codatencao', 'atencao');
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