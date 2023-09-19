<?php

declare(strict_types=1);

namespace api\Core\Hero\Race\Application\Query;

use api\Core\Hero\Race\Domain\Race;
use api\Core\Hero\Race\Domain\Repository\IRaceRepository;

class GetRaceByIdHandler
{
    private IRaceRepository $repository;

    public function __construct(IRaceRepository $repository)
    {
        $this->repository = $repository;
    }
 
    public function __invoke(int $id): ?Race
    {
        $obj = $this->repository->getbyId($id);
        return $obj;
    }
}