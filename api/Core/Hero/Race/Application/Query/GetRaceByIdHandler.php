<?php

declare(strict_types=1);

namespace api\Core\Hero\Race\Application\Query;

use api\Core\Hero\Race\Domain\{
    Race,
    Repository\IRaceRepository
};

class GetRaceByIdHandler
{
    private IRaceRepository $repository;

    public function __construct(IRaceRepository $repository)
    {
        $this->repository = $repository;
    }
 
    public function __invoke(int $raceId): ?Race
    {
        return $this->repository->getbyId($raceId);
    }
}