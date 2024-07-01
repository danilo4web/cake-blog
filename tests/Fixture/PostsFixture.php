<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PostsFixture
 */
class PostsFixture extends TestFixture
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
                'title' => 'Meu primeiro post sobre tecnologia',
                'body' => 'Hoje vamos falar sobre tecnologia...',
                'slug' => 'tech-slug',
                'user_id' => 1,
                'category_id' => 1,
                'published' => 1,
                'created' => '2024-06-30 21:20:39',
                'modified' => '2024-06-30 21:20:39',
            ],
        ];
        parent::init();
    }
}
