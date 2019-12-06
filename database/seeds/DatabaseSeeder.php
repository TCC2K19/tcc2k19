<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CursosTableSeeder::class);
        $this->call(TurmasTableSeeder::class);
        $this->call(EventosTableSeeder::class);
        $this->call(DisponibilizacoesTableSeeder::class);
        $this->call(AdminsTableSeeder::class);
    }
}
