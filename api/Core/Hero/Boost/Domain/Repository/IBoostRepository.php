<?php   

namespace api\Core\Hero\Boost\Domain\Repository;

use api\Core\Hero\Boost\Domain\Boost;

interface IBoostRepository
{
    public function getbyId(int $boostId): ?Boost;
}