<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Aluno;
use App\Models\SerieDisciplina;

class AlunoDisciplina extends Model
{
	protected $connection = 'mysql';
    protected $table = 'aluno_disciplina';
    protected $primaryKey = 'cod_aluno_disc';

    public function aluno() {
    	return $this->hasOne(Aluno::class, 'codaluno', 'codaluno')->select('codaluno','nomaluno');
    }
}