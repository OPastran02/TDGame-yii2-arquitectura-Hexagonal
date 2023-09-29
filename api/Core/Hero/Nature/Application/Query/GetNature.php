<?php

declare(strict_types=1);

namespace api\Core\Hero\Nature\Application\Query;

use api\Core\Hero\Nature\Domain\{
    Nature,
    Repository\INatureRepository
};

class GetNature
{
    private INatureRepository $repository;

    public function __construct(INatureRepository $repository)
    {
        $this->repository = $repository;
    }
 
    public function __invoke(int $natureId): ?Nature
    {
        return $this->repository->get($natureId);
    }
}