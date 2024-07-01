<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CategoriesTable;
use Cake\TestSuite\TestCase;
use Cake\ORM\Table;

class CategoriesTableTest extends TestCase
{
    protected Table $categories;

    protected $fixtures = [
        'app.Categories',
    ];

    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Categories') ? [] : ['className' => CategoriesTable::class];
        $this->categories = $this->getTableLocator()->get('Categories', $config);
    }

    protected function tearDown(): void
    {
        unset($this->categories);

        parent::tearDown();
    }

    public function testInitialize()
    {
        $this->assertInstanceOf(CategoriesTable::class, $this->categories);
    }

    public function testValidationSuccess()
    {
        $category = $this->categories->newEntity([
            'name' => 'Tech',
            'status' => 1
        ]);
        $this->assertEmpty($category->getErrors());
    }

    public function testValidationFail()
    {
        $category = $this->categories->newEntity([
            'status' => 1
        ]);
        $this->assertNotEmpty($category->getErrors());
    }
}
