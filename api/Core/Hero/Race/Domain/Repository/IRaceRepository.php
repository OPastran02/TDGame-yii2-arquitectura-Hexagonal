<?php   

namespace api\Core\Hero\Race\Domain\Repository;

use api\Core\Hero\Race\Domain\Race;

interface IRaceRepository
{
    public function getbyId(int $raceId): ?Race;
}