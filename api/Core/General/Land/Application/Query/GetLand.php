<?php

declare(strict_types=1);

namespace api\Core\General\Land\Application\Query;

use api\Core\General\Land\Domain\{
    Land,
    Repository\ILandRepository
};

class GetLandByIdHandler
{
    private ILandRepository $repository;

    public function __construct(ILandRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(string $landId): ?Land
    {
        return $this->repository->get($landId);
    }
}