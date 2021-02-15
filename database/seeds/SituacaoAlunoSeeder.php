<?php

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
            'Cursando',
            'Evadido',
            'Trocou de turma'
        ];

        foreach ($arrayRegisters as $register) {
            \DB::table('situacao_aluno')->insert([
                'situacao' => $register
            ]);
        };
    }
}
