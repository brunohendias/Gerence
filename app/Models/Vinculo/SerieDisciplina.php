<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Serie;
use App\Models\Disciplina;

class SerieDisciplina extends Model
{
	protected $connection = 'mysql';
    protected $table = 'serie_disciplina';
    protected $primaryKey = 'cod_serie_disc';

    public function serie() {
    	return $this->hasOne(Serie::class, 'cod_serie', 'cod_serie')->select('cod_serie', 'serie');
    }

    public function disciplina() {
    	return $this->hasOne(Disciplina::class, 'cod_disciplina', 'cod_disciplina')->select('cod_disciplina', 'disciplina');
    }
}
