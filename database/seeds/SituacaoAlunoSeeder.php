<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SituacaoAlunoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arrayRegisters = [
            'Aprovado',
            'Reprovado',
            'Estudando',
            'Evadiu',
            'Trocou de turma'
        ];

        foreach ($arrayRegisters as $register) {
            \DB::table('situacao_aluno')->insert([
                'situacao' => $register
            ]);
        };
    }
}
