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
    protected $primaryKey = 'cod_aluno';

    public function scopeSelectAluno($builder) {
        return $builder->select('cod_aluno','nom_aluno','email','telefone','cpf','num_matricula',
                'cod_serie','cod_turno','cod_turma','cod_prof','cod_atencao','cod_situacao');
    }

    public function candidato() {
    	return $this->hasOne(Candidato::class, 'cod_can', 'cod_can')->select('cod_can', 'nom_can');
    }
    
    public function serie()
    {
        return $this->hasOne(Serie::class, 'cod_serie', 'cod_serie')->select('cod_serie', 'serie');
    }

    public function turma()
    {
        return $this->hasOne(Turma::class, 'cod_turma', 'cod_turma')->select('cod_turma', 'turma');
    }

    public function turno()
    {
        return $this->hasOne(Turno::class, 'cod_turno', 'cod_turno')->select('cod_turno', 'turno');
    }

    public function atencao()
    {
        return $this->hasOne(Atencao::class, 'cod_atencao', 'cod_atencao')->select('cod_atencao', 'atencao');
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