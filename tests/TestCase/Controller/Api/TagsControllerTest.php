<?php
declare(strict_types=1);

namespace App\Test\TestCase\Controller\Api;

use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

class TagsControllerTest extends TestCase
{
    use IntegrationTestTrait;

    protected $fixtures = [
        'app.Tags',
    ];

    public function testAdd()
    {
        $data = [
            'name' => 'ubuntu',
            'status' => 1
        ];

        $this->post('/api/tags', $data);
        $this->assertResponseOk();
        $this->assertResponseContains('Registro adicionado com sucesso');
    }

    public function testAddValidationError()
    {
        $data = [
            'status' => 1
        ];

        $this->post('/api/tags', $data);
        $this->assertResponseError();
        $this->assertResponseCode(422);
        $this->assertResponseContains('Erro ao salvar o registro. Verifique os dados.');
    }
}
