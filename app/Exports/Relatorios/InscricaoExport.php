<?php

namespace Relatorios;

use App\Models\Inscricao;
use Illuminate\Contracts\Support\Responsable;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Excel;

class InscricaoExport implements FromQuery, WithHeadings, Responsable
{
    use Exportable;

    private $cod_serie;

    public function __construct($cod_serie)
    {
        $this->cod_serie = $cod_serie;
    }

    private string $fileName = 'inscricoes.xlsx';
    
    private string $writerType = Excel::XLSX;
    
    private array $headers = [
        'Content-Type' => 'text/csv',
    ];

    public function headings(): array
    {
        return [
            'cod_insc', 'nome', 'data nascimento',
            'email', 'telefone', 'cpf', 'rg',
            'mãe', 'pai', 'serie', 'atencao',
            'turno', 'data inscrição'
        ];
    }

    public function query(): object
    {
        if ($this->cod_serie) {
            return Inscricao::query()->where('cod_serie', $this->cod_serie);
        } else {
            return Inscricao::query();
        }
    }
}