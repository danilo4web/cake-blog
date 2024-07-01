<?php
declare(strict_types=1);

namespace App\Test\TestCase\Controller;

use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

class PostsControllerTest extends TestCase
{
    use IntegrationTestTrait;

    protected $fixtures = [
        'app.Posts',
        'app.Users',
        'app.Categories'
    ];

    public function testAdd()
    {
        $data = [
            'title' => 'Meu novo post sobre tecnologia',
            'body' => 'Texto sobre tecnologia...',
            'slug' => 'tech-post',
            'user_id' => 1,
            'category_id' => 1,
            'published' => true
        ];

        $this->post('/api/posts', $data);
        $this->assertResponseOk();
        $this->assertResponseContains('Registro adicionado com sucesso');
    }

    public function testAddValidationError()
    {
        $data = [
            'title' => 'Nova postagem sobre tecnologia.',
            'user_id' => 1,
            'category_id' => 1,
            'published' => true,
        ];

        $this->post('/api/posts', $data);
        $this->assertResponseCode(422);
        $this->assertResponseContains('Erro ao salvar o registro. Verifique os dados.');
    }
}
