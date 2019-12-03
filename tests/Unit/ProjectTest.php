<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Projeto;

/**
 * Eu, enquanto Gerente Comercial, preciso criar ordens de serviços
 * para orientar o setor de operações sobre as tarefas a serem realizadas
 *
 * Especificação:
 * - O projeto precisa ter os atributos:
 * título
 * descrição
 * entrega
 *
 * Todos os campos têm que ser preenchidos
 *
 * Especificação dos itens
 * - A tarefa precisa ter os atributos:
 * descrição
 *
 * Todos os campos têm que ser preenchidos
 */

/**
 * Template Estoria de Usuario
 * Eu, enquanto PAPEL, precisa de FEATURE para realização de uma TAREFA
 */

class ProjectTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testVerificarSeAQuantidadeDeTasksEstaCorreta()
    {
        $this->artisan('db:seed', ['--class' => 'ProjetoCom10Tasks']);

        $projeto = Projeto::where('titulo', 'Cadeiras infantis')->first();
        $this->assertEquals($projeto->tasks->count(), 10);
    }

}
