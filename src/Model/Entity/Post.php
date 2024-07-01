<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

class Post extends Entity
{
    protected $_accessible = [
        'title' => true,
        'body' => true,
        'slug' => true,
        'user_id' => true,
        'category_id' => true,
        'published' => true,
        'created' => true,
        'modified' => true,
        'user' => true,
        'category' => true,
        'post_comments' => true,
        'post_likes' => true,
        'post_views' => true,
    ];
}
