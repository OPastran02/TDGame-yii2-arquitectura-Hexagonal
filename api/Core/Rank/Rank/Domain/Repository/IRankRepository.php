<?php   

namespace api\Core\Rank\Rank\Domain\Repository;

use api\Core\Rank\Rank\Domain\Rank;

interface IRankRepository
{
    public function getbyId(int $rankId): ?Rank;
}