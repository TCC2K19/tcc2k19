<?php

use Illuminate\Database\Seeder;
use App\Models\Disponibilizacao;

class DisponibilizacoesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $disponibilizacoes = [
            //1
            ['evento' => 1, 'turma' => 1],
            ['evento' => 1, 'turma' => 2],
            ['evento' => 1, 'turma' => 3],
            ['evento' => 1, 'turma' => 4],
            ['evento' => 1, 'turma' => 5],

            ['evento' => 1, 'turma' => 8],
            ['evento' => 1, 'turma' => 9],
            ['evento' => 1, 'turma' => 10],
            ['evento' => 1, 'turma' => 11],

            ['evento' => 1, 'turma' => 14],
            ['evento' => 1, 'turma' => 15],
            ['evento' => 1, 'turma' => 16],
            ['evento' => 1, 'turma' => 17],

            //2
            ['evento' => 2, 'turma' => 1],
            ['evento' => 2, 'turma' => 2],
            ['evento' => 2, 'turma' => 3],
            ['evento' => 2, 'turma' => 4],
            ['evento' => 2, 'turma' => 5],

            ['evento' => 2, 'turma' => 8],
            ['evento' => 2, 'turma' => 9],
            ['evento' => 2, 'turma' => 10],
            ['evento' => 2, 'turma' => 11],

            ['evento' => 2, 'turma' => 14],
            ['evento' => 2, 'turma' => 15],
            ['evento' => 2, 'turma' => 16],
            ['evento' => 2, 'turma' => 17],

            //3
            ['evento' => 3, 'turma' => 1],
            ['evento' => 3, 'turma' => 2],
            ['evento' => 3, 'turma' => 3],
            ['evento' => 3, 'turma' => 4],
            ['evento' => 3, 'turma' => 5],
            ['evento' => 3, 'turma' => 6],
            ['evento' => 3, 'turma' => 7],
            ['evento' => 3, 'turma' => 8],
            ['evento' => 3, 'turma' => 9],
            ['evento' => 3, 'turma' => 10],
            ['evento' => 3, 'turma' => 11],
            ['evento' => 3, 'turma' => 12],
            ['evento' => 3, 'turma' => 13],
            ['evento' => 3, 'turma' => 14],
            ['evento' => 3, 'turma' => 15],
            ['evento' => 3, 'turma' => 16],
            ['evento' => 3, 'turma' => 17],
            ['evento' => 3, 'turma' => 18],
            ['evento' => 3, 'turma' => 19],
            ['evento' => 3, 'turma' => 20],

            //4
            ['evento' => 4, 'turma' => 6],
            ['evento' => 4, 'turma' => 12],
            ['evento' => 4, 'turma' => 18],
            ['evento' => 4, 'turma' => 19],

            //5
            ['evento' => 5, 'turma' => 1],
            ['evento' => 5, 'turma' => 2],
            ['evento' => 5, 'turma' => 3],
            ['evento' => 5, 'turma' => 4],
            ['evento' => 5, 'turma' => 5],
            ['evento' => 5, 'turma' => 6],
            ['evento' => 5, 'turma' => 7],
            ['evento' => 5, 'turma' => 8],
            ['evento' => 5, 'turma' => 9],
            ['evento' => 5, 'turma' => 10],
            ['evento' => 5, 'turma' => 11],
            ['evento' => 5, 'turma' => 12],
            ['evento' => 5, 'turma' => 13],
            ['evento' => 5, 'turma' => 14],
            ['evento' => 5, 'turma' => 15],
            ['evento' => 5, 'turma' => 16],
            ['evento' => 5, 'turma' => 17],
            ['evento' => 5, 'turma' => 18],
            ['evento' => 5, 'turma' => 19],
            ['evento' => 5, 'turma' => 20],

            //6
            ['evento' => 6, 'turma' => 6],
            ['evento' => 6, 'turma' => 12],
            ['evento' => 6, 'turma' => 18],
            ['evento' => 6, 'turma' => 19],

            //7
            ['evento' => 7, 'turma' => 1],
            ['evento' => 7, 'turma' => 2],
            ['evento' => 7, 'turma' => 3],
            ['evento' => 7, 'turma' => 4],
            ['evento' => 7, 'turma' => 5],
            ['evento' => 7, 'turma' => 6],
            ['evento' => 7, 'turma' => 7],
            ['evento' => 7, 'turma' => 8],
            ['evento' => 7, 'turma' => 9],
            ['evento' => 7, 'turma' => 10],
            ['evento' => 7, 'turma' => 11],
            ['evento' => 7, 'turma' => 12],
            ['evento' => 7, 'turma' => 13],
            ['evento' => 7, 'turma' => 14],
            ['evento' => 7, 'turma' => 15],
            ['evento' => 7, 'turma' => 16],
            ['evento' => 7, 'turma' => 17],
            ['evento' => 7, 'turma' => 18],
            ['evento' => 7, 'turma' => 19],
            ['evento' => 7, 'turma' => 20],

            //8
            ['evento' => 8, 'turma' => 1],
            ['evento' => 8, 'turma' => 2],
            ['evento' => 8, 'turma' => 3],
            ['evento' => 8, 'turma' => 4],
            ['evento' => 8, 'turma' => 5],
            ['evento' => 8, 'turma' => 6],
            ['evento' => 8, 'turma' => 7],
            ['evento' => 8, 'turma' => 8],
            ['evento' => 8, 'turma' => 9],
            ['evento' => 8, 'turma' => 10],
            ['evento' => 8, 'turma' => 11],
            ['evento' => 8, 'turma' => 12],
            ['evento' => 8, 'turma' => 13],
            ['evento' => 8, 'turma' => 14],
            ['evento' => 8, 'turma' => 15],
            ['evento' => 8, 'turma' => 16],
            ['evento' => 8, 'turma' => 17],
            ['evento' => 8, 'turma' => 18],
            ['evento' => 8, 'turma' => 19],
            ['evento' => 8, 'turma' => 20],

            //9
            ['evento' => 9, 'turma' => 1],
            ['evento' => 9, 'turma' => 2],
            ['evento' => 9, 'turma' => 3],

            ['evento' => 9, 'turma' => 8],
            ['evento' => 9, 'turma' => 9],

            ['evento' => 9, 'turma' => 14],
            ['evento' => 9, 'turma' => 15],

            //10
            ['evento' => 10, 'turma' => 1],
            ['evento' => 10, 'turma' => 2],
            ['evento' => 10, 'turma' => 3],
            ['evento' => 10, 'turma' => 4],
            ['evento' => 10, 'turma' => 5],
            ['evento' => 10, 'turma' => 6],
            ['evento' => 10, 'turma' => 7],
            ['evento' => 10, 'turma' => 8],
            ['evento' => 10, 'turma' => 9],
            ['evento' => 10, 'turma' => 10],
            ['evento' => 10, 'turma' => 11],
            ['evento' => 10, 'turma' => 12],
            ['evento' => 10, 'turma' => 13],
            ['evento' => 10, 'turma' => 14],
            ['evento' => 10, 'turma' => 15],
            ['evento' => 10, 'turma' => 16],
            ['evento' => 10, 'turma' => 17],
            ['evento' => 10, 'turma' => 18],
            ['evento' => 10, 'turma' => 19],
            ['evento' => 10, 'turma' => 20],
        ];

        if(DB::table('disponibilizacoes')->get()->count() == 0)
            Disponibilizacao::insert($disponibilizacoes);
    }
}
