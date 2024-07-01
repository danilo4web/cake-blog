<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

class PostComment extends Entity
{
    protected $_accessible = [
        'post_id' => true,
        'user_id' => true,
        'comment' => true,
        'created' => true,
        'post' => true,
        'user' => true,
    ];
}
