<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreatePosts extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     * @return void
     */
    public function change(): void
    {
        $table = $this->table('posts');
        $table->addColumn('title', 'string', ['limit' => 255])
            ->addColumn('body', 'text')
            ->addColumn('slug', 'string', ['limit' => 100])
            ->addColumn('user_id', 'integer')
            ->addColumn('category_id', 'integer')
            ->addColumn('published', 'boolean', ['default' => 0])
            ->addColumn('created', 'datetime')
            ->addColumn('modified', 'datetime', ['null' => true])
            ->addForeignKey('user_id', 'users', 'id', ['delete'=> 'NO_ACTION', 'update'=> 'NO_ACTION'])
            ->addForeignKey('category_id', 'categories', 'id', ['delete'=> 'NO_ACTION', 'update'=> 'NO_ACTION'])
            ->create();
    }
}
