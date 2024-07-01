<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PostsTable;
use Cake\TestSuite\TestCase;

class PostsTableTest extends TestCase
{
    protected $Posts;

    protected $fixtures = [
        'app.Posts',
        'app.Users',
        'app.Categories'
    ];

    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Posts') ? [] : ['className' => PostsTable::class];
        $this->Posts = $this->getTableLocator()->get('Posts', $config);
    }

    protected function tearDown(): void
    {
        unset($this->Posts);

        parent::tearDown();
    }

    public function testValidationDefault(): void
    {
        $validator = $this->Posts->getValidator('default');
        $this->assertTrue($validator->hasField('title'));
        $this->assertTrue($validator->hasField('body'));
        $this->assertTrue($validator->hasField('slug'));
        $this->assertTrue($validator->hasField('user_id'));
        $this->assertTrue($validator->hasField('category_id'));
        $this->assertTrue($validator->hasField('published'));
    }
}
