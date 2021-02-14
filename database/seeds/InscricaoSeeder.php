<?php

use Illuminate\Database\Seeder;

class InscricaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arrayRegisters = [
            [ 'ni' => 'Antonio Julio Igor Porto', 'em' => 'antonioo_@pontofinalcafe.com.br', 'tl' => '(77) 98814-9617', 'cf' => '558.942.582-43', 'dn' => '01/01/1998', 'rg' => '41.434.574-5', 'nm' => 'Vanessa Antonella Mariana', 'np' => 'Raimundo Cauê Matheus Porto', 'se' => 0, 'tu' => 0, 'ta' => 0,],
            [ 'ni' => 'Enzo Benício Pereira', 'em' => 'enzobeniciopereira-86@hotmail.com', 'tl' => '(95) 99657-6753', 'cf' => '046.443.511-05', 'dn' => '01/10/1985', 'rg' => '21.408.812-1', 'nm' => 'Vitória Hadassa Sara', 'np' => 'Mateus Francisco Carlos Eduardo Pereira', 'se' => 0, 'tu' => 0, 'ta' => 0,],
            [ 'ni' => 'Fábio Sebastião João da Paz', 'em' => 'fabiosebastiaoapaz@centrovias.com.br', 'tl' => '(93) 99590-8256', 'cf' => '589.165.828-30', 'dn' => '24/05/1966', 'rg' => '15.011.912-4', 'nm' => 'Valentina Isabella', 'np' => 'Severino Jorge Marcos da Paz', 'se' => 0, 'tu' => 0, 'ta' => 0,],
            [ 'ni' => 'Cláudio Sérgio Gabriel Jesus', 'em' => 'claudioseresus@obrativaengenharia.com.br', 'tl' => '(79) 98474-2388', 'cf' => '530.448.795-82', 'dn' => '11/05/1946', 'rg' => '47.656.868-7', 'nm' => 'Sophia Bárbara Jaqueline', 'np' => 'Daniel Erick Rodrigo Jesus', 'se' => 0, 'tu' => 0, 'ta' => 0,],
            [ 'ni' => 'Aparecida Elisa Barros', 'em' => 'aparecidael5@escritorioindaia.com.br', 'tl' => '(96) 99633-1777', 'cf' => '502.936.825-69', 'dn' => '05/11/1971', 'rg' => '15.518.473-8', 'nm' => 'Brenda Sara', 'np' => 'Henrique Calebe Barros', 'se' => 0, 'tu' => 0, 'ta' => 0,],
            [ 'ni' => 'Elias Diego Gomes', 'em' => 'eliasdiegogomes_@valepur.com.br', 'tl' => '(92) 99912-9232', 'cf' => '917.248.916-26', 'dn' => '23/06/2002', 'rg' => '19.426.487-7', 'nm' => 'Laura Caroline', 'np' => 'Igor Bruno Lucca Gomes', 'se' => 0, 'tu' => 0, 'ta' => 0,],
            [ 'ni' => 'Thiago Luan Julio da Costa', 'em' => 'thiagoluanjula-91@gracomonline.com.br', 'tl' => '(51) 99765-6613', 'cf' => '568.861.285-15', 'dn' => '07/09/1954', 'rg' => '31.280.759-4', 'nm' => 'Renata Benedita Letícia', 'np' => 'Arthur Henry Bryan da Costa', 'se' => 0, 'tu' => 0, 'ta' => 0,],
            [ 'ni' => 'Theo Manoel da Silva', 'em' => 'theomanosilva_@tirantea.com.br', 'tl' => '(67) 99306-3230', 'cf' => '737.493.006-23', 'dn' => '01/02/2001', 'rg' => '28.737.635-7', 'nm' => 'Marcela Betina', 'np' => 'Fábio Pedro Daniel da Silva', 'se' => 0, 'tu' => 0, 'ta' => 0,],
            [ 'ni' => 'Clara Aline Sônia da Paz', 'em' => 'claraalinesoz_@delfrateinfo.com.br', 'tl' => '(68) 99306-6621', 'cf' => '103.267.507-11', 'dn' => '01/12/1985', 'rg' => '42.104.154-7', 'nm' => 'Olivia Liz Melissa', 'np' => 'Vitor Renato da Paz', 'se' => 0, 'tu' => 0, 'ta' => 0,],
            [ 'ni' => 'Henrique Tiago Vitor da Silva', 'em' => 'hhenragovitordasilva@kframe.com.br', 'tl' => '(65) 99283-1881', 'cf' => '492.459.170-02', 'dn' => '05/05/1954', 'rg' => '45.835.011-4', 'nm' => 'Carolina Rosa', 'np' => 'Fábio Bernardo da Silva', 'se' => 0, 'tu' => 0, 'ta' => 0,],
            [ 'ni' => 'Lúcia Allana Francisca da Conceição', 'em' => 'luciaalcadaconceicao@ime.unicamp.br', 'tl' => '(84) 99126-5139', 'cf' => '634.576.367-53', 'dn' => '11/08/1973', 'rg' => '30.994.394-2', 'nm' => 'Evelyn Giovanna', 'np' => 'Isaac Anderson Danilo da Conceição', 'se' => 0, 'tu' => 0, 'ta' => 0,],
            [ 'ni' => 'Hadassa Vitória Ana Almeida', 'em' => 'hadassavieida@policiamilitar.br', 'tl' => '(88) 98739-6145', 'cf' => '565.730.879-41', 'dn' => '25/02/1944', 'rg' => '22.758.246-9', 'nm' => 'Stefany Luciana', 'np' => 'Enrico Daniel Cauê Almeida', 'se' => 0, 'tu' => 0, 'ta' => 0,],
            [ 'ni' => 'Ana Brenda Tânia Mendes', 'em' => 'anabrendataniamendes_@icloud.con', 'tl' => '(98) 98881-3423', 'cf' => '048.344.580-08', 'dn' => '14/12/1971', 'rg' => '19.842.295-7', 'nm' => 'Clarice Elisa Rita', 'np' => 'Antonio Lorenzo Mendes', 'se' => 0, 'tu' => 0, 'ta' => 0,],
            [ 'ni' => 'Murilo Ricardo João Novaes', 'em' => 'murilors_@sheilabenavente.com.br', 'tl' => '(95) 99117-7117', 'cf' => '498.212.746-84', 'dn' => '13/06/1960', 'rg' => '46.411.694-6', 'nm' => 'Heloise Betina', 'np' => 'Leonardo Roberto Henry Novaes', 'se' => 0, 'tu' => 0, 'ta' => 0,],
            [ 'ni' => 'Kaique Ricardo Kevin Farias', 'em' => 'kkaiquericaarias@prositeweb.com.br', 'tl' => '(68) 99391-5589', 'cf' => '299.367.584-20', 'dn' => '13/09/1983', 'rg' => '33.266.317-6', 'nm' => 'Alessandra Benedita', 'np' => 'Bernardo Augusto Benício Farias', 'se' => 0, 'tu' => 0, 'ta' => 0,],
            [ 'ni' => 'Carlos Emanuel Barbosa', 'em' => 'carlosemanuelbabarbosa@fanger.com.br', 'tl' => '(69) 99816-9375', 'cf' => '246.161.741-48', 'dn' => '08/07/1995', 'rg' => '23.465.058-8', 'nm' => 'Yasmin Rosa', 'np' => 'Anderson Thomas Barbosa', 'se' => 0, 'tu' => 0, 'ta' => 0,],
            [ 'ni' => 'Victor Alexandre Vieira', 'em' => 'victoralexanieira_@negleribeiro.com', 'tl' => '(68) 99328-4658', 'cf' => '290.359.735-93', 'dn' => '12/02/1992', 'rg' => '29.309.587-5', 'nm' => 'Fabiana Camila Emily', 'np' => 'Enrico Emanuel Vieira', 'se' => 0, 'tu' => 0, 'ta' => 0,],
            [ 'ni' => 'Emilly Maria Mariana das Neves', 'em' => 'emillymariamsneves@arganet.com.br', 'tl' => '(43) 99961-9186', 'cf' => '557.742.491-74', 'dn' => '27/06/2002', 'rg' => '23.812.025-9', 'nm' => 'Rafaela Vitória', 'np' => 'Davi Samuel das Neves', 'se' => 0, 'tu' => 0, 'ta' => 0,],
            [ 'ni' => 'Gustavo Yuri Erick das Neves', 'em' => 'ggustavoyurierickdasneves@3cfast.com.br', 'tl' => '(63) 99260-5262', 'cf' => '039.658.835-26', 'dn' => '22/04/1977', 'rg' => '31.795.816-1', 'nm' => 'Maria Francisca', 'np' => 'Erick Cauã Caleb das Neves', 'se' => 0, 'tu' => 0, 'ta' => 0,],
            [ 'ni' => 'Edson Anthony de Paula', 'em' => 'edsonanthouidorapetfarm.com.br', 'tl' => '(86) 99555-5412', 'cf' => '488.531.263-96', 'dn' => '11/05/1942', 'rg' => '50.274.518-6', 'nm' => 'Stella Alice Mariah', 'np' => 'Carlos Eduardo Emanuel Samuel de Paula', 'se' => 0, 'tu' => 0, 'ta' => 0,],
            [ 'ni' => 'Antonio José Barros', 'em' => 'antoniojosebarros-72@kinouchi.com.br', 'tl' => '(95) 98891-9805', 'cf' => '416.960.086-03', 'dn' => '07/02/1961', 'rg' => '39.906.069-8', 'nm' => 'Sônia Kamilly', 'np' => 'Jorge Juan Barros', 'se' => 0, 'tu' => 0, 'ta' => 0,],
            [ 'ni' => 'Victor Francisco Renato Nunes', 'em' => 'victorfrancitonunes@pelozo.com.br', 'tl' => '(68) 99317-7547', 'cf' => '792.611.517-79', 'dn' => '10/10/1953', 'rg' => '16.083.788-1', 'nm' => 'Alana Laís', 'np' => 'Samuel Leonardo Kevin Nunes', 'se' => 0, 'tu' => 0, 'ta' => 0,],
            [ 'ni' => 'Carlos Eduardo Pietro da Cruz', 'em' => 'carloseduardodacruz@cuppari.com.br', 'tl' => '(44) 99209-4007', 'cf' => '787.855.493-55', 'dn' => '09/02/1986', 'rg' => '19.071.247-8', 'nm' => 'Carolina Malu Sophia', 'np' => 'Isaac Murilo Benjamin da Cruz', 'se' => 0, 'tu' => 0, 'ta' => 0,],
            [ 'ni' => 'Fernando Daniel Caio Freitas', 'em' => 'fernandodanilcaiofreitas@engeco.com.br', 'tl' => '(91) 98875-7408', 'cf' => '677.662.670-71', 'dn' => '03/07/1950', 'rg' => '16.484.676-1', 'nm' => 'Lívia Sônia Raquel', 'np' => 'Caleb Leandro Julio Freitas', 'se' => 0, 'tu' => 0, 'ta' => 0,],
            [ 'ni' => 'Sandra Luna Elaine Gonçalves', 'em' => 'sandralunaelagoncalves@lukin4.com.br', 'tl' => '(82) 99998-2517', 'cf' => '243.901.419-29', 'dn' => '17/10/1950', 'rg' => '27.107.886-8', 'nm' => 'Emilly Eduarda Gabriela', 'np' => 'Manuel Pedro Gonçalves', 'se' => 0, 'tu' => 0, 'ta' => 0,],
            [ 'ni' => 'Arthur Luís Vitor da Silva', 'em' => 'aarthurluisvitordasilva@yaooh.com', 'tl' => '(84) 98890-8776', 'cf' => '126.119.627-90', 'dn' => '09/08/2002', 'rg' => '32.403.583-4', 'nm' => 'Sophia Carla Eliane', 'np' => 'Daniel Matheus da Silva', 'se' => 0, 'tu' => 0, 'ta' => 0,],
            [ 'ni' => 'Diogo Severino Pinto', 'em' => 'diogoseverpinto@tpltransportes.com.br', 'tl' => '(27) 99939-7544', 'cf' => '071.070.756-83', 'dn' => '17/12/1949', 'rg' => '21.484.502-3', 'nm' => 'Benedita Carla Agatha', 'np' => 'Davi Giovanni Breno Pinto', 'se' => 0, 'tu' => 0, 'ta' => 0,],
            [ 'ni' => 'Gabrielly Fernanda da Rocha', 'em' => 'gabriellyfe@caocarinho.com.br', 'tl' => '(65) 99751-2093', 'cf' => '714.102.657-65', 'dn' => '23/11/1947', 'rg' => '32.730.827-8', 'nm' => 'Kamilly Vera Helena', 'np' => 'Yago Vinicius Luís da Rocha', 'se' => 0, 'tu' => 0, 'ta' => 0,],
            [ 'ni' => 'Vitória Giovanna Fabiana Ferreira', 'em' => 'vitoriagiovannrreira@trustsign.com.br', 'tl' => '(86) 99534-2177', 'cf' => '412.035.128-99', 'dn' => '01/11/1960', 'rg' => '38.348.376-1', 'nm' => 'Benedita Laís Lavínia', 'np' => 'Erick Bernardo Ferreira', 'se' => 0, 'tu' => 0, 'ta' => 0,],
            [ 'ni' => 'Tereza Stefany Marli Moreira', 'em' => 'terezastefanymra@r7.com', 'tl' => '(61) 99323-6052', 'cf' => '028.360.537-55', 'dn' => '23/01/1981', 'rg' => '23.593.654-6', 'nm' => 'Olivia Aurora Helena', 'np' => 'Thomas Luís Nicolas Moreira', 'se' => 0, 'tu' => 0, 'ta' => 0],
        ];

        foreach ($arrayRegisters as $register) {
            \DB::table('atencao')->insert([
                'nom_insc' => $register['ni'],
                'email' => $register['em'],
                'telefone' => $register['tl'],
                'cpf' => $register['cf'],
                'data_nasci' => $register['dn'],
                'rg' => $register['rg'],
                'nom_mae' => $register['nm'],
                'nom_pai' => $register['np'],
                'cod_serie' => $register['se'],
                'cod_turno' => $register['tu'],
                'cod_atencao' => $register['ta'],
            ]);
        };
    }
}
