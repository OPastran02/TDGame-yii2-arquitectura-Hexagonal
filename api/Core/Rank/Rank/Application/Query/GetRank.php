<?php

declare(strict_types=1);

namespace api\Core\Rank\Rank\Application\Query;

use api\Core\Rank\Rank\Domain\{
    Rank,
    Repository\IRankRepository
};

class GetRank
{
    private IRankRepository $repository;

    public function __construct(IRankRepository $repository)
    {
        $this->repository = $repository;
    }
 
    public function __invoke(int $rankId): ?Rank
    {
        return $this->repository->getbyId($rankId);
    }
}