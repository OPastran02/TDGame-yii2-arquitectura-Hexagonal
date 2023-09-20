<?php   

namespace api\Core\Player\Player\Domain\Repository;

use api\Core\Player\Player\Domain\Player;
use api\Core\Player\Player\Domain\Players;

interface IPlayerRepository
{
    public function getbyId(int $id): ?Player;
}