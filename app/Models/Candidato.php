<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Serie;
use App\Models\Turma;
use App\Models\Turno;
use App\Models\Atencao;
use App\Models\Professor;

class Candidato extends Model
{
	protected $connection = 'mysql';
    protected $table = 'candidato';
    protected $primaryKey = 'cod_can';
    public $fillable = [
        'telefone','email','cod_serie','cod_turma','cod_turno','cod_atencao','cod_prof','ind_aluno'
    ];

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
}
