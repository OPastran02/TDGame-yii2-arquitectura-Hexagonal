<?php   

namespace api\Core\Rank\Rank\Domain\Repository;

use api\Core\Rank\Rank\Domain\Rank;
use api\Core\Rank\Rank\Domain\Ranks;

interface IRankRepository
{
    public function getbyId(int $id): ?Rank;
}