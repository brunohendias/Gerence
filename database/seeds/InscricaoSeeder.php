<?php

use Illuminate\Database\Seeder;

class InscricaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $arrayRegisters = [
            [ 'ni' => 'Antonio Julio Igor Porto', 'em' => 'antonioo_@pontofinalcafe.com.br', 'tl' => '7798814-9617', 'cf' => '558.942.582-43', 'dn' => '1998/01/01', 'rg' => '41.434.574-5', 'nm' => 'Vanessa Antonella Mariana', 'np' => 'Raimundo Cauê Matheus Porto', 'se' => 1, 'tu' => 1, 'ta' => 1],
            [ 'ni' => 'Enzo Benício Pereira', 'em' => 'enzobeniciopereira-86@hotmail.com', 'tl' => '9599657-6753', 'cf' => '046.443.511-05', 'dn' => '1985/10/01', 'rg' => '21.408.812-1', 'nm' => 'Vitória Hadassa Sara', 'np' => 'Mateus Francisco Carlos Eduardo Pereira', 'se' => 1, 'tu' => 1, 'ta' => 1],
            [ 'ni' => 'Fábio Sebastião João da Paz', 'em' => 'fabiosebastiaoapaz@centrovias.com.br', 'tl' => '9399590-8256', 'cf' => '589.165.828-30', 'dn' => '1966/05/24', 'rg' => '15.011.912-4', 'nm' => 'Valentina Isabella', 'np' => 'Severino Jorge Marcos da Paz', 'se' => 1, 'tu' => 1, 'ta' => 1],
            [ 'ni' => 'Cláudio Sérgio Gabriel Jesus', 'em' => 'claudioseresus@obrativaengenharia.com.br', 'tl' => '7998474-2388', 'cf' => '530.448.795-82', 'dn' => '1946/05/11', 'rg' => '47.656.868-7', 'nm' => 'Sophia Bárbara Jaqueline', 'np' => 'Daniel Erick Rodrigo Jesus', 'se' => 1, 'tu' => 1, 'ta' => 1],
            [ 'ni' => 'Aparecida Elisa Barros', 'em' => 'aparecidael5@escritorioindaia.com.br', 'tl' => '9699633-1777', 'cf' => '502.936.825-69', 'dn' => '1971/11/05', 'rg' => '15.518.473-8', 'nm' => 'Brenda Sara', 'np' => 'Henrique Calebe Barros', 'se' => 1, 'tu' => 1, 'ta' => 1],
            [ 'ni' => 'Elias Diego Gomes', 'em' => 'eliasdiegogomes_@valepur.com.br', 'tl' => '9299912-9232', 'cf' => '917.248.916-26', 'dn' => '2002/06/23', 'rg' => '19.426.487-7', 'nm' => 'Laura Caroline', 'np' => 'Igor Bruno Lucca Gomes', 'se' => 1, 'tu' => 1, 'ta' => 1],
            [ 'ni' => 'Thiago Luan Julio da Costa', 'em' => 'thiagoluanjula-91@gracomonline.com.br', 'tl' => '5199765-6613', 'cf' => '568.861.285-15', 'dn' => '1954/09/07', 'rg' => '31.280.759-4', 'nm' => 'Renata Benedita Letícia', 'np' => 'Arthur Henry Bryan da Costa', 'se' => 1, 'tu' => 1, 'ta' => 1],
            [ 'ni' => 'Theo Manoel da Silva', 'em' => 'theomanosilva_@tirantea.com.br', 'tl' => '6799306-3230', 'cf' => '737.493.006-23', 'dn' => '2001/02/01', 'rg' => '28.737.635-7', 'nm' => 'Marcela Betina', 'np' => 'Fábio Pedro Daniel da Silva', 'se' => 1, 'tu' => 1, 'ta' => 1],
            [ 'ni' => 'Clara Aline Sônia da Paz', 'em' => 'claraalinesoz_@delfrateinfo.com.br', 'tl' => '6899306-6621', 'cf' => '103.267.507-11', 'dn' => '1985/12/01', 'rg' => '42.104.154-7', 'nm' => 'Olivia Liz Melissa', 'np' => 'Vitor Renato da Paz', 'se' => 1, 'tu' => 1, 'ta' => 1],
            [ 'ni' => 'Henrique Tiago Vitor da Silva', 'em' => 'hhenragovitordasilva@kframe.com.br', 'tl' => '6599283-1881', 'cf' => '492.459.170-02', 'dn' => '1954/05/05', 'rg' => '45.835.011-4', 'nm' => 'Carolina Rosa', 'np' => 'Fábio Bernardo da Silva', 'se' => 1, 'tu' => 1, 'ta' => 1],
            [ 'ni' => 'Lúcia Allana Francisca da Conceição', 'em' => 'luciaalcadaconceicao@ime.unicamp.br', 'tl' => '8499126-5139', 'cf' => '634.576.367-53', 'dn' => '1973/08/11', 'rg' => '30.994.394-2', 'nm' => 'Evelyn Giovanna', 'np' => 'Isaac Anderson Danilo da Conceição', 'se' => 1, 'tu' => 1, 'ta' => 1],
            [ 'ni' => 'Hadassa Vitória Ana Almeida', 'em' => 'hadassavieida@policiamilitar.br', 'tl' => '8898739-6145', 'cf' => '565.730.879-41', 'dn' => '1944/02/25', 'rg' => '22.758.246-9', 'nm' => 'Stefany Luciana', 'np' => 'Enrico Daniel Cauê Almeida', 'se' => 1, 'tu' => 1, 'ta' => 1],
            [ 'ni' => 'Ana Brenda Tânia Mendes', 'em' => 'anabrendataniamendes_@icloud.con', 'tl' => '9898881-3423', 'cf' => '048.344.580-08', 'dn' => '1971/12/14', 'rg' => '19.842.295-7', 'nm' => 'Clarice Elisa Rita', 'np' => 'Antonio Lorenzo Mendes', 'se' => 1, 'tu' => 1, 'ta' => 1],
            [ 'ni' => 'Murilo Ricardo João Novaes', 'em' => 'murilors_@sheilabenavente.com.br', 'tl' => '9599117-7117', 'cf' => '498.212.746-84', 'dn' => '1960/06/13', 'rg' => '46.411.694-6', 'nm' => 'Heloise Betina', 'np' => 'Leonardo Roberto Henry Novaes', 'se' => 1, 'tu' => 1, 'ta' => 1],
            [ 'ni' => 'Kaique Ricardo Kevin Farias', 'em' => 'kkaiquericaarias@prositeweb.com.br', 'tl' => '6899391-5589', 'cf' => '299.367.584-20', 'dn' => '1983/09/13', 'rg' => '33.266.317-6', 'nm' => 'Alessandra Benedita', 'np' => 'Bernardo Augusto Benício Farias', 'se' => 1, 'tu' => 1, 'ta' => 1],
            [ 'ni' => 'Carlos Emanuel Barbosa', 'em' => 'carlosemanuelbabarbosa@fanger.com.br', 'tl' => '6999816-9375', 'cf' => '246.161.741-48', 'dn' => '1995/07/08', 'rg' => '23.465.058-8', 'nm' => 'Yasmin Rosa', 'np' => 'Anderson Thomas Barbosa', 'se' => 1, 'tu' => 1, 'ta' => 1],
            [ 'ni' => 'Victor Alexandre Vieira', 'em' => 'victoralexanieira_@negleribeiro.com', 'tl' => '6899328-4658', 'cf' => '290.359.735-93', 'dn' => '1992/02/12', 'rg' => '29.309.587-5', 'nm' => 'Fabiana Camila Emily', 'np' => 'Enrico Emanuel Vieira', 'se' => 1, 'tu' => 1, 'ta' => 1],
            [ 'ni' => 'Emilly Maria Mariana das Neves', 'em' => 'emillymariamsneves@arganet.com.br', 'tl' => '4399961-9186', 'cf' => '557.742.491-74', 'dn' => '2002/06/27', 'rg' => '23.812.025-9', 'nm' => 'Rafaela Vitória', 'np' => 'Davi Samuel das Neves', 'se' => 1, 'tu' => 1, 'ta' => 1],
            [ 'ni' => 'Gustavo Yuri Erick das Neves', 'em' => 'ggustavoyurierickdasneves@3cfast.com.br', 'tl' => '6399260-5262', 'cf' => '039.658.835-26', 'dn' => '1977/04/22', 'rg' => '31.795.816-1', 'nm' => 'Maria Francisca', 'np' => 'Erick Cauã Caleb das Neves', 'se' => 1, 'tu' => 1, 'ta' => 1],
            [ 'ni' => 'Edson Anthony de Paula', 'em' => 'edsonanthouidorapetfarm.com.br', 'tl' => '8699555-5412', 'cf' => '488.531.263-96', 'dn' => '1942/05/11', 'rg' => '50.274.518-6', 'nm' => 'Stella Alice Mariah', 'np' => 'Carlos Eduardo Emanuel Samuel de Paula', 'se' => 1, 'tu' => 1, 'ta' => 1],
            [ 'ni' => 'Antonio José Barros', 'em' => 'antoniojosebarros-72@kinouchi.com.br', 'tl' => '9598891-9805', 'cf' => '416.960.086-03', 'dn' => '1961/02/07', 'rg' => '39.906.069-8', 'nm' => 'Sônia Kamilly', 'np' => 'Jorge Juan Barros', 'se' => 1, 'tu' => 1, 'ta' => 1],
            [ 'ni' => 'Victor Francisco Renato Nunes', 'em' => 'victorfrancitonunes@pelozo.com.br', 'tl' => '6899317-7547', 'cf' => '792.611.517-79', 'dn' => '1953/10/10', 'rg' => '16.083.788-1', 'nm' => 'Alana Laís', 'np' => 'Samuel Leonardo Kevin Nunes', 'se' => 1, 'tu' => 1, 'ta' => 1],
            [ 'ni' => 'Carlos Eduardo Pietro da Cruz', 'em' => 'carloseduardodacruz@cuppari.com.br', 'tl' => '4499209-4007', 'cf' => '787.855.493-55', 'dn' => '1986/02/09', 'rg' => '19.071.247-8', 'nm' => 'Carolina Malu Sophia', 'np' => 'Isaac Murilo Benjamin da Cruz', 'se' => 1, 'tu' => 1, 'ta' => 1],
            [ 'ni' => 'Fernando Daniel Caio Freitas', 'em' => 'fernandodanilcaiofreitas@engeco.com.br', 'tl' => '9198875-7408', 'cf' => '677.662.670-71', 'dn' => '1950/07/03', 'rg' => '16.484.676-1', 'nm' => 'Lívia Sônia Raquel', 'np' => 'Caleb Leandro Julio Freitas', 'se' => 1, 'tu' => 1, 'ta' => 1],
            [ 'ni' => 'Sandra Luna Elaine Gonçalves', 'em' => 'sandralunaelagoncalves@lukin4.com.br', 'tl' => '8299998-2517', 'cf' => '243.901.419-29', 'dn' => '1950/10/17', 'rg' => '27.107.886-8', 'nm' => 'Emilly Eduarda Gabriela', 'np' => 'Manuel Pedro Gonçalves', 'se' => 1, 'tu' => 1, 'ta' => 1],
            [ 'ni' => 'Arthur Luís Vitor da Silva', 'em' => 'aarthurluisvitordasilva@yaooh.com', 'tl' => '8498890-8776', 'cf' => '126.119.627-90', 'dn' => '2002/08/09', 'rg' => '32.403.583-4', 'nm' => 'Sophia Carla Eliane', 'np' => 'Daniel Matheus da Silva', 'se' => 1, 'tu' => 1, 'ta' => 1],
            [ 'ni' => 'Diogo Severino Pinto', 'em' => 'diogoseverpinto@tpltransportes.com.br', 'tl' => '2799939-7544', 'cf' => '071.070.756-83', 'dn' => '1949/12/17', 'rg' => '21.484.502-3', 'nm' => 'Benedita Carla Agatha', 'np' => 'Davi Giovanni Breno Pinto', 'se' => 1, 'tu' => 1, 'ta' => 1],
            [ 'ni' => 'Gabrielly Fernanda da Rocha', 'em' => 'gabriellyfe@caocarinho.com.br', 'tl' => '6599751-2093', 'cf' => '714.102.657-65', 'dn' => '1947/11/23', 'rg' => '32.730.827-8', 'nm' => 'Kamilly Vera Helena', 'np' => 'Yago Vinicius Luís da Rocha', 'se' => 1, 'tu' => 1, 'ta' => 1],
            [ 'ni' => 'Vitória Giovanna Fabiana Ferreira', 'em' => 'vitoriagiovannrreira@trustsign.com.br', 'tl' => '8699534-2177', 'cf' => '412.035.128-99', 'dn' => '1960/11/01', 'rg' => '38.348.376-1', 'nm' => 'Benedita Laís Lavínia', 'np' => 'Erick Bernardo Ferreira', 'se' => 1, 'tu' => 1, 'ta' => 1],
            [ 'ni' => 'Tereza Stefany Marli Moreira', 'em' => 'terezastefanymra@r7.com', 'tl' => '6199323-6052', 'cf' => '028.360.537-55', 'dn' => '1981/01/23', 'rg' => '23.593.654-6', 'nm' => 'Olivia Aurora Helena', 'np' => 'Thomas Luís Nicolas Moreira', 'se' => 1, 'tu' => 1, 'ta' => 1],
        ];

        foreach ($arrayRegisters as $register) {
            \DB::table('inscricao')->insert([
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
