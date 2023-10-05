<?php

declare(strict_types=1);

namespace api\Core\Guild\Stash\Application\Query;

use api\Core\Guild\Stash\Domain\{
    Stash,
    Repository\IStashRepository
};

class GetStash
{
    private IStashRepository $repository;

    public function __construct(IStashRepository $repository)
    {
        $this->repository = $repository;
    }
 
    public function __invoke(string $stashId): ?Stash
    {
        return $this->repository->get($stashId);
    }
}