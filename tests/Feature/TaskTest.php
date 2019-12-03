<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Tests\TestCase;
use App\Projeto;
use App\User;

class TaskTest extends TestCase
{
    use RefreshDatabase;

    protected $usuario;

    protected function setUp(): void
    {
        parent::setUp();

        $this->usuario = new User(array(
            'name' => 'Fulano',
            'email' => 'fulano@gmail.com',
            'password' => 'pass',
            'papel' => User::GERENTE_COMERCIAL
        ));

        $this->be($this->usuario); // loga
    }

    public function testVerificarCriacaoDaTask()
    {
        $projeto = Projeto::create([
            'titulo' => 'text',
            'descricao' => 'text descricao',
            'data' => '11-11-2019'
        ]);

        $data = [
            'descricao' => 'tasktest',
            'projeto_id' => $projeto->id
        ];
        $response = $this->post('tasks', $data);
        $response->assertStatus(Response::HTTP_CREATED);

        $this->assertDatabaseHas('tasks', $data);
    }

    public function testVerificarCamposNulos()
    {
        $data = [];
        $response = $this->post('/tasks', $data);
        $response->assertSessionHasErrors(['descricao', 'projeto_id']);
    }
}
