<?php

use Illuminate\Database\Seeder;
use App\Models\Evento;

class EventosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $eventos = [
            //24/08/2020
            [
                'id' => 1,
                'nome' => 'A biotecnologia em prol da sustentabilidade na Jardinagem',
                'local' => 'Sala 21',
                'inicio' => '18:30',
                'fim' => '19:30',
                'data' => '2020-08-24',
                'responsavel' => 'Daniela Chaves',
                'tipo_evento' => 'Palestra',
                'vagas' => 40,
                'publico_alvo' => 'CMA e CTA'
            ],
            [
                'id' => 2,
                'nome' => 'Oficina Amigurumi - primeira parte',
                'local' => 'Sala 19',
                'inicio' => '18:30',
                'fim' => '20:30',
                'data' => '2020-08-24',
                'responsavel' => 'Aline Ferreira',
                'tipo_evento' => 'Oficina',
                'vagas' => 20,
                'publico_alvo' => 'CMA e CTA'
            ],

            //25/08/2019
            [
                'id' => 3,
                'nome' => 'Palestra de apresentação de custo do cardápio médio praticado no Restaurante do IFRJ, Campus Pinheiral.',
                'local' => 'Sala 18',
                'inicio' => '9:30',
                'fim' => '11:00',
                'data' => '2020-08-25',
                'responsavel' => 'Élida da Conceição Jorge',
                'tipo_evento' => 'Palestra',
                'vagas' => 40,
                'publico_alvo' => 'Todos'
            ],
            [
                'id' => 4,
                'nome' => 'Alta performance de sites: técnicas para melhorar o desempenho do seu site',
                'local' => 'Laboratório de Informática 5',
                'inicio' => '9:30',
                'fim' => '10:30',
                'data' => '2020-08-25',
                'responsavel' => 'Igor Guilherme Ribeiro Lopes',
                'tipo_evento' => 'Palestra',
                'vagas' => 30,
                'publico_alvo' => 'CTI '
            ],
            [
                'id' => 5,
                'nome' => 'Oficina de Basquetebol',
                'local' => 'Quadra coberta',
                'inicio' => '14:00',
                'fim' => '17:00',
                'data' => '2020-08-25',
                'responsavel' => 'Lionel dos Santos Feitosa Rodrigues',
                'tipo_evento' => 'Oficina',
                'vagas' => 40,
                'publico_alvo' => 'Todos'
            ],
            [
                'id' => 6,
                'nome' => 'Fundamentos de robótica: Equipe Minotauro PUC-Rio',
                'local' => 'Laboratório de Informática 5 e quadra descoberta',
                'inicio' => '14:00',
                'fim' => '17:00',
                'data' => '2020-08-25',
                'responsavel' => 'Carlos Luiz Machado de Souza Júnior',
                'tipo_evento' => 'Mesa Redonda',
                'vagas' => 30,
                'publico_alvo' => 'CTI'
            ],
            [
                'id' => 7,
                'nome' => 'Mãe Beata de Iemanjá: uma conversa sobre racismo,
                intolerância e resistência das práticas religiosas de
                matriz africana',
                'local' => 'Auditório',
                'inicio' => '18:30',
                'fim' => '20:30',
                'data' => '2020-08-25',
                'responsavel' => 'Neabi',
                'tipo_evento' => 'Mesa Redonda',
                'vagas' => 180,
                'publico_alvo' => 'Todos'
            ],

            //26/08/2020
            [
                'id' => 8,
                'nome' => 'Prevenindo o suicídio: Centro de Valorização da Vida - CVV',
                'local' => 'Espaço em frente ao auditório',
                'inicio' => '10:00',
                'fim' => '12:00',
                'data' => '2020-08-26',
                'responsavel' => 'Saúde em Foco',
                'tipo_evento' => 'Exposição',
                'vagas' => 60,
                'publico_alvo' => 'Todos'
            ],
            [
                'id' => 9,
                'nome' => 'Ética animal e sua articulação no IFRJ – Campus Pinheiral',
                'local' => 'Sala 17',
                'inicio' => '14:30',
                'fim' => '16:30',
                'data' => '2020-08-26',
                'responsavel' => 'Amanda Veloso Garcia',
                'tipo_evento' => 'Roda de Conversa',
                'vagas' => 40,
                'publico_alvo' => 'CTA'
            ],
            [
                'id' => 10,
                'nome' => 'Oficina de canto',
                'local' => 'Sala de Artes',
                'inicio' => '18:00',
                'fim' => '21:00',
                'data' => '2020-08-26',
                'responsavel' => 'Jéssica de Fátima Rossone Alves',
                'tipo_evento' => 'Oficina',
                'vagas' => 10,
                'publico_alvo' => 'Todos'
            ],
            //27/09/2020


            //28/09/2020


            /*
            [
                'id' => ,
                'nome' => '',
                'local' => '',
                'inicio' => '',
                'fim' => '',
                'data' => '2020-08-26',
                'responsavel' => '',
                'tipo_evento' => '',
                'vagas' => ,
                'publico_alvo' => ''
            ],
            */
        ];

        if(DB::table('eventos')->get()->count() == 0)
            Evento::insert($eventos);
    }
}
