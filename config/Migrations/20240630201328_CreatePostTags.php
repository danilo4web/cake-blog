<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreatePostTags extends AbstractMigration
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
        $table = $this->table('post_tags');
        $table->addColumn('tags_id', 'integer')
            ->addColumn('posts_id', 'integer')
            ->addForeignKey('tags_id', 'tags', 'id', ['delete'=> 'NO_ACTION', 'update'=> 'NO_ACTION'])
            ->addForeignKey('posts_id', 'posts', 'id', ['delete'=> 'NO_ACTION', 'update'=> 'NO_ACTION'])
            ->create();
    }
}
