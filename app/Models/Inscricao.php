<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Serie;
use App\Models\Turno;

class Inscricao extends Model
{
    protected $connection = 'mysql';
    protected $table = 'inscricao';
    protected $primaryKey = 'cod_insc';
    protected $fillable = ['ind_candidato'];

    public function serie()
    {
    	return $this->hasOne(Serie::class, 'cod_serie', 'cod_serie')->select('cod_serie', 'serie');
    }

    public function turno()
    {
    	return $this->hasOne(Turno::class, 'cod_turno', 'cod_turno')->select('cod_turno', 'turno');
    }

    public function scopeSelectInscricao($builder) {
        return $builder->select(
            'cod_insc', 
            'nom_insc', 
            'email',
            'telefone',
            'cpf',
            'cod_serie',
            'cod_turno',
            'cod_atencao'
        );
    }
}
