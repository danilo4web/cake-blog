<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TagsTable;
use Cake\TestSuite\TestCase;

class TagsTableTest extends TestCase
{
    protected $Tags;

    protected $fixtures = [
        'app.Tags',
    ];

    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Tags') ? [] : ['className' => TagsTable::class];
        $this->Tags = $this->getTableLocator()->get('Tags', $config);
    }

    protected function tearDown(): void
    {
        unset($this->Tags);

        parent::tearDown();
    }

    public function testInitialize()
    {
        $this->assertInstanceOf(TagsTable::class, $this->Tags);
    }

    public function testValidationSuccess()
    {
        $tag = $this->Tags->newEntity([
            'name' => 'New Tag',
            'status' => 1
        ]);
        $this->assertEmpty($tag->getErrors());
    }

    public function testValidationFail()
    {
        $tag = $this->Tags->newEntity([
            'name' => '',
            'status' => 1
        ]);
        $this->assertNotEmpty($tag->getErrors());
    }
}
