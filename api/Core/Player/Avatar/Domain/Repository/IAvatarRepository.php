<?php   

namespace api\Core\Player\Avatar\Domain\Repository;

use api\Core\Player\Avatar\Domain\Avatar;
use api\Core\Player\Avatar\Domain\Avatars;

interface IAvatarRepository
{    
    public function getbyId(string $id): ?Avatar;
}