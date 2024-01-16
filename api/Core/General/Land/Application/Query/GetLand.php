<?php

declare(strict_types=1);

namespace api\Core\General\Land\Application\Query;

use api\Core\General\Land\Domain\{
    Land,
    Repository\ILandReadRepository
};

class GetLandByIdHandler
{
    private ILandReadRepository $repository;

    public function __construct(ILandReadRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(string $landId): ?Land
    {
        return $this->repository->get($landId);
    }
}