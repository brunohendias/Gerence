<?php

namespace App\Models\Vinculo;

use Illuminate\Database\Eloquent\Model;
use App\Models\Aluno;

class AlunoDisciplina extends Model
{
	protected $connection = 'mysql';
    protected $table = 'aluno_disciplina';
    protected $primaryKey = 'cod_aluno_disc';

    public function aluno(): object
    {
    	return $this->hasOne(Aluno::class, 'cod_aluno', 'cod_aluno');
    }
}
