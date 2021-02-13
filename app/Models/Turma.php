<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Serie;
use App\Models\Turno;

class Turma extends Model
{
	protected $connection = 'mysql';
    protected $table = 'turma';
    protected $primaryKey = 'cod_turma';

    public function serie()
    {
    	return $this->hasOne(Serie::class, 'cod_serie', 'cod_serie');
    }

    public function turno()
    {
    	return $this->hasOne(Turno::class, 'cod_turno', 'cod_turno');
    }
}
