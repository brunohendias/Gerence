<?php

use Illuminate\Database\Seeder;

class AtencaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arrayRegisters = [
            'Nenhuma', 
            'Nescessidades especiais', 
            'Hiperativo',
            'Déficit de atenção',
            'Conduta agressiva'
        ];

        foreach ($arrayRegisters as $register) {
            \DB::table('atencao')->insert([
                'atencao' => $register
            ]);
        };
    }
}
