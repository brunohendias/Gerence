<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Serie;
use App\Models\Turno;

class Inscricao extends Model
{
    protected $connection = 'mysql';
    protected $table = 'inscricao';
    protected $primaryKey = 'codinsc';
    protected $fillable = ['ind_candidato'];

    public function serie()
    {
    	return $this->hasOne(Serie::class, 'codserie', 'codserie')->select('codserie', 'serie');
    }

    public function turno()
    {
    	return $this->hasOne(Turno::class, 'codturno', 'codturno')->select('codturno', 'turno');
    }

    public function scopeSelectInscricao($builder) {
        return $builder->select('codinsc', 'nominsc', 'email', 'telefone', 'cpf', 'codserie', 'codturno', 'ind_candidato');
    }
}
