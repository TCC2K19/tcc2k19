<?php

use Illuminate\Database\Seeder;
use App\Models\Curso;

class CursosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cursos = [
            [
                'id' => 1,
                'sigla' => 'TA',
                'nome' => 'Técnico em Agropecuária'
            ],
            [
                'id' => 2,
                'sigla' => 'MA',
                'nome' => 'Técnico em Meio Ambiente'
            ],
            [
                'id' => 3,
                'sigla' => 'TI',
                'nome' => 'Técnico em Informática'
            ],
            [
                'id' => 4,
                'sigla' => 'AI',
                'nome' => 'Técnico em Agroindústria'
            ]
        ];

        if(DB::table('cursos')->get()->count() == 0)
            Curso::insert($cursos);
    }
}
