<?php

use Illuminate\Database\Seeder;

class CandidatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arrayRegisters = [
            [ 'ni' => 'Antonio Julio Igor Porto', 'em' => 'antonioo_@pontofinalcafe.com.br', 
                'tl' => '7798814-9617', 'cf' => '558.942.582-43', 'se' => 1, 'ci' => 1, 'ca' => 1],
        ];

        foreach ($arrayRegisters as $register) {
            \DB::table('candidato')->insert([
                'nom_can' => $register['ni'],
                'email' => $register['em'],
                'telefone' => $register['tl'],
                'cpf' => $register['cf'],
                'cod_atencao' => $register['ca'],
                'cod_insc' => $register['ci'],
                'cod_serie_v' => $register['se']
            ]);
        };
    }
}