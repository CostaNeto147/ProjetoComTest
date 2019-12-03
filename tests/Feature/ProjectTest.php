<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;
use Tests\TestCase;
use App\User;

class ProjectTest extends TestCase
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

    public function testVerificarCriacaoDaOrdemDeServico(){
        /**
         * validacao do projeto
         */
        $data_projeto = [ //envio
            'titulo' => 'Patronage',
            'descricao' => 'Sistema gerenciamento de Bolsas',
            'data' => '11-11-2019'
        ];

        $response = $this->post('/projetos', $data_projeto); // envio
        $response->assertStatus(Response::HTTP_CREATED); // validacao do envio
        $this->assertDatabaseHas('projetos', $data_projeto); // validacao base


        /**
         * validacao da task
         */
        $projeto = DB::table('projetos')->where([ // buscar projeto cadastrado
            ['titulo',$data_projeto['titulo']],
            ['descricao',$data_projeto['descricao']],
            ['data',$data_projeto['data']]
        ])->first();

        $data_task = [
            'descricao' => 'tasktest',
            'projeto_id' => $projeto->id
        ];

        $response = $this->post('tasks', $data_task); // envio
        $response->assertStatus(Response::HTTP_CREATED); // valida envio
        $this->assertDatabaseHas('tasks', $data_task); // validacao base
    }

    public function testVerificarCamposNulos()
    {
        $data = [];
        $response = $this->post('/projetos', $data);
        $response->assertSessionHasErrors(['titulo', 'descricao','data']);
    }
}
