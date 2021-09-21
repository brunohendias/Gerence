<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Atencao;
use App\Models\Candidato;
use App\Models\Situacao;

class Aluno extends Model
{
	protected $connection = 'mysql';
    protected $table = 'aluno';
    protected $primaryKey = 'cod_aluno';

    public function scopeSelectAluno(object $builder): object
    {
        return $builder->select(
            'cod_aluno','nom_aluno','email','telefone','cpf','num_matricula','serie_v.cod_serie_v','cod_atencao','cod_situacao',
            'serie.cod_serie','serie','turno.cod_turno','turno','turma.cod_turma','turma','professor.cod_prof','nom_prof');
    }

    public function scopeJoinDadosSerie(object $builder): object
    {
        return $builder->join('serie_v', 'serie_v.cod_serie_v', '=', 'aluno.cod_serie_v')
            ->join('serie', 'serie_v.cod_serie', '=', 'serie.cod_serie')
            ->join('turno', 'serie_v.cod_turno', '=', 'turno.cod_turno')
            ->join('turma', 'serie_v.cod_turma', '=', 'turma.cod_turma')
            ->join('professor', 'serie_v.cod_prof', '=', 'professor.cod_prof');
    }

    public function candidato(): object
    {
    	return $this->hasOne(Candidato::class, 'cod_can', 'cod_can');
    }
    
    public function atencao(): object
    {
        return $this->hasOne(Atencao::class, 'cod_atencao', 'cod_atencao');
    }

    public function situacao(): object
    {
        return $this->hasOne(Situacao::class, 'cod_situacao', 'cod_situacao');
    }
}