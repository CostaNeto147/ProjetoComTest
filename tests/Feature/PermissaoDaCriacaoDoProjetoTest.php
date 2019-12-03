<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Tests\TestCase;
use App\User;

class PermissaoDaCriacaoDoProjeto extends TestCase
{
    use RefreshDatabase;

    protected $usuario;
    protected $projeto_data;

    protected function setUp(): void
    {
        parent::setUp();

        $this->usuario = new User(array(
            'name' => 'Fulano',
            'email' => 'fulano@gmail.com',
            'password' => 'pass'
        ));

        $this->projeto_data = [
            'titulo' => 'teste',
            'descricao' => 'testest',
            'data' => '11-11-2019'
        ];
    }

    public function testVerificarUsuarioNaoAutenticado()
    {
        $response = $this->post('/projetos', $this->projeto_data);
        $response->assertStatus(Response::HTTP_FOUND);
        $response->assertRedirect(route('login'));
    }

    public function testVerificarUsuarioAutenticadoSemPermissao()
    {
        $this->be($this->usuario); // loga
        $response = $this->post('/projetos', $this->projeto_data);
        $response->assertStatus(Response::HTTP_UNAUTHORIZED);
    }

    public function testVerificarUsuarioGerenteComercial()
    {
        $this->usuario->papel = User::GERENTE_COMERCIAL;
        $this->be($this->usuario); // loga

        $response = $this->post('/projetos', $this->projeto_data);
        $response->assertStatus(Response::HTTP_CREATED);
        $this->assertDatabaseHas('projetos', $this->projeto_data);
    }
}
