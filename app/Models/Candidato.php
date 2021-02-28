<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Vinculo\SerieVinculo;
use App\Models\Atencao;
use App\Models\Serie;
use App\Models\Turno;
use App\Models\Turma;
use App\Models\Professor;
use App\Models\inscricao;

class Candidato extends Model
{
	protected $connection = 'mysql';
    protected $table = 'candidato';
    protected $primaryKey = 'cod_can';
    public $fillable = [ 'telefone','email','cod_serie_v','cod_atencao' ];

    public function atencao()
    {
        return $this->hasOne(Atencao::class, 'cod_atencao', 'cod_atencao')->select('cod_atencao', 'atencao');
    }

    public function inscricao()
    {
        return $this->hasOne(inscricao::class, 'cod_insc', 'cod_insc');
    }

    public function scopeSelectCandidato($builder) {
        return $builder->select(
            'cod_can','nom_can','serie_v.cod_serie_v','cod_atencao','email','telefone','cpf','serie.cod_serie','serie',
            'turno.cod_turno','turno','turma.cod_turma','turma','professor.cod_prof','nom_prof'
        );
    }

    public function scopeJoinDadosSerie($builder) {
        return $builder->join('serie_v', 'serie_v.cod_serie_v', '=', 'candidato.cod_serie_v')
            ->join('serie', 'serie_v.cod_serie', '=', 'serie.cod_serie')
            ->join('turno', 'serie_v.cod_turno', '=', 'turno.cod_turno')
            ->join('turma', 'serie_v.cod_turma', '=', 'turma.cod_turma')
            ->join('professor', 'serie_v.cod_prof', '=', 'professor.cod_prof');
    }
}
