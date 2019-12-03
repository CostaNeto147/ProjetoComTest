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
        // $this->call(UsersTableSeeder::class);
        \App\User::create([
            'name' => 'Teste Fapema GC',
            'email' => 'teste@fapema.br',
            'password' => bcrypt('fapema123'),
            'papel' => 2
        ]);
    }
}
