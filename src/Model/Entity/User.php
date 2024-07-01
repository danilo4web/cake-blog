<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

class User extends Entity
{
    protected $_accessible = [
        'name' => true,
        'email' => true,
        'password' => true,
        'created' => true,
        'modified' => true,
        'post_comments' => true,
        'post_likes' => true,
        'post_views' => true,
        'posts' => true,
    ];

    protected $_hidden = [
        'password',
    ];
}
