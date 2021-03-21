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

    public function scopeSelectInscricao(object $builder): object
    {
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
    
    public function serie(): object
    {
    	return $this->hasOne(Serie::class, 'cod_serie', 'cod_serie');
    }

    public function turno(): object
    {
    	return $this->hasOne(Turno::class, 'cod_turno', 'cod_turno');
    }
}
