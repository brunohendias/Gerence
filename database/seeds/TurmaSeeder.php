<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TurmaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arrayRegisters = [
            'A','B','C','D'
        ];

        foreach ($arrayRegisters as $register) {
            \DB::table('turma')->insert([
                'turma' => $register
            ]);
        };
    }
}
