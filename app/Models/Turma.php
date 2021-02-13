<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Serie;
use App\Models\Turno;

class Turma extends Model
{
	protected $connection = 'mysql';
    protected $table = 'turma';
    protected $primaryKey = 'codturma';

    public function serie()
    {
    	return $this->hasOne(Serie::class, 'codserie', 'codserie');
    }

    public function turno()
    {
    	return $this->hasOne(Turno::class, 'codturno', 'codturno');
    }
}
