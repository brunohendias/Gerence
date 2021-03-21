<?php

namespace App\Models\Vinculo;

use Illuminate\Database\Eloquent\Model;
use App\Models\Serie;
use App\Models\Turma;
use App\Models\Turno;
use App\Models\Professor;

class SerieVinculo extends Model
{
    protected $connection = 'mysql';
    protected $table = 'serie_v';
    protected $primaryKey = 'cod_serie_v';
    protected $fillable = ['qtd_alunos','cod_turno','cod_turma','limite_alunos','cod_prof'];

    public function serie(): object
    {
    	return $this->hasOne(Serie::class, 'cod_serie', 'cod_serie');
    }

    public function turno(): object
    {
    	return $this->hasOne(Turno::class, 'cod_turno', 'cod_turno');
    }

    public function turma(): object
    {
    	return $this->hasOne(Turma::class, 'cod_turma', 'cod_turma');
    }

    public function professor(): object
    {
    	return $this->hasOne(Professor::class, 'cod_prof', 'cod_prof');
    }
}
