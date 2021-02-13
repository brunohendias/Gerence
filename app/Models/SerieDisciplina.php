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
    	return $this->hasOne(Serie::class, 'codserie', 'codserie')->select('codserie', 'serie');
    }

    public function disciplina() {
    	return $this->hasOne(Disciplina::class, 'coddisciplina', 'coddisciplina')->select('coddisciplina', 'disciplina');
    }
}
