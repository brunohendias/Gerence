<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Serie;
use App\Models\Turma;
use App\Models\Turno;

class SerieVinculo extends Model
{
    protected $connection = 'mysql';
    protected $table = 'serie_v';
    protected $primaryKey = 'codserie_v';
    protected $fillable = ['qtd_alunos'];

    public function serie()
    {
    	return $this->hasOne(Serie::class, 'codserie', 'codserie')->select('codserie','serie');
    }

    public function turno()
    {
    	return $this->hasOne(Turno::class, 'codturno', 'codturno')->select('codturno','turno');
    }

    public function turma()
    {
    	return $this->hasOne(Turma::class, 'codturma', 'codturma')->select('codturma','turma');
    }
}
