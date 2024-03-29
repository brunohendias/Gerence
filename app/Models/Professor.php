<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Serie;
use App\Models\Turma;
use App\Models\Turno;
use App\Models\Atencao;

class Professor extends Model
{
	protected $connection = 'mysql';
    protected $table = 'professor';
    protected $primaryKey = 'cod_prof';

    public function turno(): object
    {
    	return $this->hasOne(Turno::class, 'cod_turno', 'cod_turno');
    }

    public function serie(): object
    {
    	return $this->hasOne(Serie::class, 'cod_serie', 'cod_serie');
    }

    public function turma(): object
    {
    	return $this->hasOne(Turma::class, 'cod_turma', 'cod_turma');
    }

    public function atencao(): object
    {
    	return $this->hasOne(Atencao::class, 'cod_atencao', 'cod_atencao');
    }
}
