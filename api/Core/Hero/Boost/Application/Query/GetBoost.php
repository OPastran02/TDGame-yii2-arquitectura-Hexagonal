<?php

declare(strict_types=1);

namespace api\Core\Hero\Boost\Application\Query;

use api\Core\Hero\Boost\Domain\{
    Boost,
    Repository\IBoostRepository
};

class GetBoost
{
    private IBoostRepository $repository;

    public function __construct(IBoostRepository $repository)
    {
        $this->repository = $repository;
    }
 
    public function __invoke(int $boostId): ?Boost
    {
        $boost = $this->repository->get($boostId);
        return $boost;
    }
}