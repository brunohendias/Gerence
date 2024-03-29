<?php

namespace App\Models\Vinculo;

use Illuminate\Database\Eloquent\Model;
use App\Models\Professor;
use App\Models\Atencao;

class ProfessorVinculo extends Model
{
   	protected $connection = 'mysql';
    protected $table = 'professor_v';
    protected $primaryKey = 'cod_prof_v';

    public function professor(): object
    {
    	return $this->hasOne(Professor::class, 'cod_prof', 'cod_prof');
    }

    public function atencao(): object
    {
    	return $this->hasOne(Atencao::class, 'cod_atencao', 'cod_atencao');
    }

    public function scopeSelectProfessor(object $builder): object
    {
        return $builder->select('cod_prof_v','cod_prof','cod_atencao');
    }
}