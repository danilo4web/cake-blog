<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreatePostComments extends AbstractMigration
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
        $table = $this->table('post_comments');
        $table->addColumn('post_id', 'integer')
            ->addColumn('user_id', 'integer')
            ->addColumn('comment', 'text', ['null' => true])
            ->addColumn('created', 'datetime')
            ->addForeignKey('post_id', 'posts', 'id', ['delete'=> 'NO_ACTION', 'update'=> 'NO_ACTION'])
            ->addForeignKey('user_id', 'users', 'id', ['delete'=> 'NO_ACTION', 'update'=> 'NO_ACTION'])
            ->create();
    }
}
