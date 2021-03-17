<?php

namespace Relatorios;

use App\Models\Atencao;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AtencaoExport implements FromCollection, WithHeadings
{
    private $colunms_name = [
        'cod_atencao',
        'atencao',
    ];

    public function headings(): array
    {
        return $this->colunms_name;
    }

    public function collection()
    {
        return Atencao::select('cod_atencao', 'atencao')->get();
    }
}