<?php   

namespace api\Core\Player\Player\Domain\Repository;

use api\Core\Player\Player\Domain\Player;

interface IPlayerRepository
{
    public function get(string $playerId): ?Player;
    public function create($player): ?Player;
}