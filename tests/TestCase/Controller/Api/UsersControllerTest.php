<?php
declare(strict_types=1);

namespace App\Test\TestCase\Controller;

use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

class UsersControllerTest extends TestCase
{
    use IntegrationTestTrait;

    protected $fixtures = [
        'app.Users'
    ];

    public function testAdd()
    {
        $data = [
            'name' => 'Danilo Pereira',
            'email' => 'danilo.pereira@email.com',
            'password' => 'secret123',
        ];

        $this->post('/api/users', $data);
        $this->assertResponseOk();
        $this->assertResponseContains('Registro adicionado com sucesso');
    }

    public function testAddValidationError()
    {
        $data = [
            'name' => 'Invalid User Test',
            'email' => 'invalid-email',
            'password' => 'short',
        ];

        $this->post('/api/users', $data);
        $this->assertResponseCode(422);
        $this->assertResponseContains('Erro ao salvar o registro. Verifique os dados.');
    }
}
