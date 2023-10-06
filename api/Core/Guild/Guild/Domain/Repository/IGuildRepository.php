<?php   

namespace api\Core\Guild\Guild\Domain\Repository;

use api\Core\Guild\Guild\Domain\Guild;

interface IGuildRepository
{
    public function get(string $playerId): ?Guild;
    public function create($player): ?Guild;
    public function addExperience($player): ?Guild;
}