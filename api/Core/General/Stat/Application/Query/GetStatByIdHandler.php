<?php

declare(strict_types=1);

namespace api\Core\General\Stat\Application\Query;

use api\Core\General\Stat\Domain\{
    Stat,
    Repository\IStatRepository
};

class GetStatByIdHandler
{
    private IStatRepository $repository;

    public function __construct(IStatRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(string $statId): ?Stat
    {
        $obj = $this->repository->getbyId($statId);
        return $obj;
    }
}