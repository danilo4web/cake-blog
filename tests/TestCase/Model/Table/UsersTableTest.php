<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UsersTable;
use Cake\TestSuite\TestCase;
use Cake\ORM\TableRegistry;
use Cake\ORM\Table;

class UsersTableTest extends TestCase
{
    protected Table $users;

    protected $fixtures = [
        'app.Users',
    ];

    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Users') ? [] : ['className' => UsersTable::class];
        $this->users = TableRegistry::getTableLocator()->get('Users', $config);
    }

    public function tearDown(): void
    {
        unset($this->users);

        parent::tearDown();
    }

    public function testValidationDefault()
    {
        $data = [
            'name' => 'Danilo Pereira',
            'email' => 'danilo@email.com',
            'password' => 'secret123',
        ];

        $user = $this->users->newEntity($data);
        $this->assertEmpty($user->getErrors());
    }
}
