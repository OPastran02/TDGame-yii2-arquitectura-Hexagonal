<?php   

namespace api\Core\Player\Avatar\Domain\Repository;

use api\Core\Player\Avatar\Domain\Avatar;

interface IAvatarRepository
{    
    public function get(string $avatarId): ?Avatar;
    public function create($avatar): ?Avatar;
}