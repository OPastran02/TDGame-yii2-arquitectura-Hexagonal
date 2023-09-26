<?php

declare(strict_types=1);

namespace api\Core\Hero\Boost\Application\Query;

use api\Core\Hero\Boost\Domain\Boost;
use api\Core\Hero\Boost\Domain\Repository\IBoostRepository;

class GetBoostByIdHandler
{
    private IBoostRepository $repository;

    public function __construct(IBoostRepository $repository)
    {
        $this->repository = $repository;
    }
 
    public function __invoke(int $id): ?Boost
    {
        $boost = $this->repository->getbyId($id);
        return $boost;
    }
}