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
    protected $primaryKey = 'cod_prof_v';

    public function professor() {
    	return $this->hasOne(Professor::class, 'cod_prof', 'cod_prof')->select(['cod_prof', 'nom_prof']);
    }

    public function serie() {
    	return $this->hasOne(Serie::class, 'cod_serie', 'cod_serie')->select(['cod_serie', 'serie']);
    }

    public function turno() {
    	return $this->hasOne(Turno::class, 'cod_turno', 'cod_turno')->select(['cod_turno', 'turno']);
    }

    public function atencao() {
    	return $this->hasOne(Atencao::class, 'cod_atencao', 'cod_atencao')->select(['cod_atencao', 'atencao']);
    }

    public function scopeSelectProfessor($builder) {
        return $builder->select('cod_prof_v', 'cod_prof', 'cod_serie', 'cod_turno', 'cod_atencao');
    }
}