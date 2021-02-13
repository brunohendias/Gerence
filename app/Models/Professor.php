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
    protected $primaryKey = 'codprof';

    public function turno()
    {
    	return $this->hasOne(Turno::class, 'codturno', 'codturno');
    }

    public function serie()
    {
    	return $this->hasOne(Serie::class, 'codserie', 'codserie');
    }

    public function turma()
    {
    	return $this->hasOne(Turma::class, 'codturma', 'codturma');
    }

    public function atencao()
    {
    	return $this->hasOne(Atencao::class, 'codatencao', 'codatencao');
    }
}
