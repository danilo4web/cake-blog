<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

class TagsFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'name' => 'Tag 1',
                'status' => 1,
            ],
            [
                'id' => 2,
                'name' => 'Tag 2',
                'status' => 1,
            ],
        ];
        parent::init();
    }
}
