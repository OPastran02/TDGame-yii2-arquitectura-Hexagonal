<?php   

namespace api\Core\Guild\Guild\Domain\Repository;

use api\Core\Guild\Guild\Domain\Guild;
use api\Core\Guild\Guild\Domain\Guilds;

interface IGuildRepository
{
    public function getbyId(int $id): ?Guild;
}