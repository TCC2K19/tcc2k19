<?php

use Illuminate\Database\Seeder;
use App\Models\Turma;

class TurmasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $turmas = [
            [
                'id' => 1,
                'numero' => 100,
                'curso' =>  1,
                'periodo' => '1º ano'
            ],
            [
                'id' => 2,
                'numero' => 101,
                'curso' =>  1,
                'periodo' => '1º ano'
            ],
            [
                'id' => 3,
                'numero' => 102,
                'curso' =>  1,
                'periodo' => '1º ano'
            ],
            [
                'id' => 4,
                'numero' => 103,
                'curso' =>  2,
                'periodo' => '1º ano'
            ],
            [
                'id' => 5,
                'numero' => 104,
                'curso' =>  2,
                'periodo' => '1º ano'
            ],
            [
                'id' => 6,
                'numero' => 105,
                'curso' =>  3,
                'periodo' => '1º ano'
            ],
            [
                'id' => 7,
                'numero' => 107,
                'curso' =>  4,
                'periodo' => '1º ano'
            ],

            [
                'id' => 8,
                'numero' => 201,
                'curso' =>  1,
                'periodo' => '2º ano'
            ],
            [
                'id' => 9,
                'numero' => 202,
                'curso' =>  1,
                'periodo' => '2º ano'
            ],
            [
                'id' => 10,
                'numero' => 203,
                'curso' =>  2,
                'periodo' => '2º ano'
            ],
            [
                'id' => 11,
                'numero' => 204,
                'curso' =>  2,
                'periodo' => '2º ano'
            ],
            [
                'id' => 12,
                'numero' => 205,
                'curso' =>  3,
                'periodo' => '2º ano'
            ],
            [
                'id' => 13,
                'numero' => 207,
                'curso' =>  4,
                'periodo' => '2º ano'
            ],

            [
                'id' => 14,
                'numero' => 301,
                'curso' =>  1,
                'periodo' => '3º ano'
            ],
            [
                'id' => 15,
                'numero' => 302,
                'curso' =>  1,
                'periodo' => '3º ano'
            ],
            [
                'id' => 16,
                'numero' => 303,
                'curso' =>  2,
                'periodo' => '3º ano'
            ],
            [
                'id' => 17,
                'numero' => 304,
                'curso' =>  2,
                'periodo' => '3º ano'
            ],
            [
                'id' => 18,
                'numero' => 305,
                'curso' =>  3,
                'periodo' => '3º ano'
            ],
            [
                'id' => 19,
                'numero' => 306,
                'curso' =>  3,
                'periodo' => '3º ano'
            ],
            [
                'id' => 20,
                'numero' => 307,
                'curso' =>  4,
                'periodo' => '3º ano'
            ],
        ];

        if(DB::table('turmas')->get()->count() == 0)
            Turma::insert($turmas);
    }
}
