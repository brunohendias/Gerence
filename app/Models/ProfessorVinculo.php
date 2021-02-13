<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Professor;
use App\Models\Serie;
use App\Models\Turno;
use App\Models\Atencao;

class ProfessorVinculo extends Model
{
   	protected $connection = 'mysql';
    protected $table = 'professor_v';
    protected $primaryKey = 'codprof_v';

    public function professor() {
    	return $this->hasOne(Professor::class, 'codprof', 'codprof')->select(['codprof', 'nomprof']);
    }

    public function serie() {
    	return $this->hasOne(Serie::class, 'codserie', 'codserie')->select(['codserie', 'serie']);
    }

    public function turno() {
    	return $this->hasOne(Turno::class, 'codturno', 'codturno')->select(['codturno', 'turno']);
    }

    public function atencao() {
    	return $this->hasOne(Atencao::class, 'codatencao', 'codatencao')->select(['codatencao', 'atencao']);
    }

    public function scopeSelectProfessor($builder) {
        return $builder->select('codprof_v', 'codprof', 'codserie', 'codturno', 'codatencao');
    }
}