<?php

use Illuminate\Database\Seeder;
use App\User;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'id' => 1,
                'name' => 'Administrador',
                'email' => 'adm@expo.com',
                'password' => bcrypt('123'),
                'access_level' => 'admin'
            ],
            [
                'id' => 2,
                'name' => 'Moderator 1',
                'email' => 'mod1@expo.com',
                'password' => bcrypt('123'),
                'access_level' => 'mod'
            ],
            [
                'id' => 3,
                'name' => 'Moderator 2',
                'email' => 'mod2@expo.com',
                'password' => bcrypt('123'),
                'access_level' => 'mod'
            ],
        ];

        if(DB::table('users')->get()->count() == 0)
            user::insert($users);
    }
}
