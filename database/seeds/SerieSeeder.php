<?php

use Illuminate\Database\Seeder;

class SerieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arrayRegisters = [
            '1ª Ano Ensino Fundamental',
            '2ª Ano Ensino Fundamental',
            '3ª Ano Ensino Fundamental',
            '4ª Ano Ensino Fundamental',
            '5ª Ano Ensino Fundamental',
            '6ª Ano Ensino Fundamental',
            '7ª Ano Ensino Fundamental',
            '8ª Ano Ensino Fundamental',
            '9ª Ano Ensino Fundamental',
            '1ª Ano Ensino Médio',
            '2ª Ano Ensino Médio',
            '3ª Ano Ensino Médio'
        ];

        foreach ($arrayRegisters as $register) {
            \DB::table('serie')->insert([
                'serie' => $register
            ]);
        };
    }
}
