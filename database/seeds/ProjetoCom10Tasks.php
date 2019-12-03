<?php

use Illuminate\Database\Seeder;
use App\Projeto;
use App\Task;

class ProjetoCom10Tasks extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $projeto = Projeto::create([
            'titulo' => 'Cadeiras infantis',
            'descricao' => 'Exemplo do Workshop',
            'data' => '11-11-2019'
        ]);

        $lista = [
            'tajsdiahus',
            'tajsdiahus',
            'tajsdiahus',
            'tajsdiahus',
            'tajsdiahus',
            'tajsdiahus',
            'tajsdiahus',
            'tajsdiahus',
            'tajsdiahus',
            'tajsdiahus'
        ];

        foreach ($lista as $item) {
            Task::create([
                'descricao' => $item,
                'projeto_id' => $projeto->id
            ]);
        }
    }
}
