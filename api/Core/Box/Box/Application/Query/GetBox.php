<?php

declare(strict_types=1);

namespace api\Core\Box\Box\Application\Query;

use api\Core\Box\Box\Domain\{
    Box,
    Repository\IBoxRepository
};

class GetBox
{
    private IBoxRepository $repository;

    public function __construct(IBoxRepository $repository)
    {
        $this->repository = $repository;
    }
 
    public function __invoke(int $boxId): ?Box
    {
        return $this->repository->get($boxId);
    }
}