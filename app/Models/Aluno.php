<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Atencao;
use App\Models\Candidato;
use App\Models\Situacao;
use App\Models\Vinculo\SerieVinculo;

class Aluno extends Model
{
	protected $connection = 'mysql';
    protected $table = 'aluno';
    protected $primaryKey = 'cod_aluno';

    public function scopeSelectAluno($builder) {
        return $builder->select('cod_aluno','nom_aluno','email','telefone','cpf',
            'num_matricula','cod_serie_v','cod_atencao','cod_situacao');
    }

    public function candidato() {
    	return $this->hasOne(Candidato::class, 'cod_can', 'cod_can')->select('cod_can', 'nom_can');
    }
    
    public function serie()
    {
        return $this->hasOne(SerieVinculo::class, 'cod_serie_v', 'cod_serie_v');
    }

    public function atencao()
    {
        return $this->hasOne(Atencao::class, 'cod_atencao', 'cod_atencao')->select('cod_atencao', 'atencao');
    }

    public function situacao()
    {
        return $this->hasOne(Situacao::class, 'cod_situacao', 'cod_situacao')->select('cod_situacao', 'situacao');
    }
}