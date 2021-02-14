<?php

namespace App\Models\Vinculo;

use Illuminate\Database\Eloquent\Model;
use App\Models\Serie;
use App\Models\Turma;
use App\Models\Turno;

class SerieVinculo extends Model
{
    protected $connection = 'mysql';
    protected $table = 'serie_v';
    protected $primaryKey = 'cod_serie_v';
    protected $fillable = ['qtd_alunos'];

    public function serie()
    {
    	return $this->hasOne(Serie::class, 'cod_serie', 'cod_serie')->select('cod_serie','serie');
    }

    public function turno()
    {
    	return $this->hasOne(Turno::class, 'cod_turno', 'cod_turno')->select('cod_turno','turno');
    }

    public function turma()
    {
    	return $this->hasOne(Turma::class, 'cod_turma', 'cod_turma')->select('cod_turma','turma');
    }
}
