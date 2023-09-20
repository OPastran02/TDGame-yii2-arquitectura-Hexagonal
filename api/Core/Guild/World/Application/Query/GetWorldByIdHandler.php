<?php

declare(strict_types=1);

namespace api\Core\General\World\Application\Query;

use api\Core\General\World\Domain\World;
use api\Core\General\World\Domain\Repository\IWorldRepository;

class GetWorldByIdHandler
{
    private IWorldRepository $repository;

    public function __construct(IWorldRepository $repository)
    {
        $this->repository = $repository;
    }
 
    public function __invoke(int $id): ?World
    {
        $hero = $this->repository->getbyId($id);
        return $hero;
    }
}