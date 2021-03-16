<?php

namespace Relatorios;

use App\Models\Inscricao;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class InscricaoExport implements FromCollection, WithHeadings
{
    private $colunms_name = [
        'cod_insc',
        'nome',
        'data nascimento',
        'email',
        'telefone',
        'cpf',
        'rg',
        'mãe',
        'pai',
        'serie',
        'atencao',
        'turno',
        'data inscrição'
    ];

    public function headings(): array
    {
        return $this->colunms_name;
    }

    public function collection()
    {
        return Inscricao::all();
    }
}