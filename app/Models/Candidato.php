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
    protected $primaryKey = 'codcan';
    public $fillable = [
        'telefone','email','codserie','codturma','codturno','codatencao','codprof','ind_aluno'
    ];

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
}
