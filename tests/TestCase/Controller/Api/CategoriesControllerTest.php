<?php
declare(strict_types=1);

namespace App\Test\TestCase\Controller;

use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

class CategoriesControllerTest extends TestCase
{
    use IntegrationTestTrait;

    protected $fixtures = [
        'app.Categories'
    ];

    public function testAdd()
    {
        $data = [
            'name' => 'tech',
            'status' => 1
        ];

        $this->post('/api/categories', $data);
        $this->assertResponseOk();
        $this->assertResponseContains('Registro adicionado com sucesso');
    }

    public function testAddValidationError()
    {
        $data = [
            'status' => 1
        ];

        $this->post('/api/categories', $data);
        $this->assertResponseError();
        $this->assertResponseCode(422);
        $this->assertResponseContains('Erro ao salvar o registro. Verifique os dados.');
    }
}
