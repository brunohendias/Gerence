<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DisciplinaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arrayRegisters = [
            'Língua Portuguesa',
            'Matemática',
            'História',
            'Geografia',
            'Ciências',
            'Artes',
            'Inglês',
            'Química',
            'Física',
            'Biologia',
            'Sociologia',
            'Filosofia',
            'Espanhol',
            'Educação Física'
        ];

        foreach ($arrayRegisters as $register) {
            \DB::table('disciplina')->insert([
                'disciplina' => $register
            ]);
        };
    }
}
