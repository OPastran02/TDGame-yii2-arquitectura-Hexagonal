<?php

declare(strict_types=1);

namespace api\Core\Player\Status\Application\Query;

use api\Core\Player\Status\Domain\{
    Status,
    Repository\IStatusRepository
};

class GetStatus
{
    private IStatusRepository $repository;

    public function __construct(IStatusRepository $repository)
    {
        $this->repository = $repository;
    }
 
    public function __invoke(string $statusId): ?Status
    {
        return $this->repository->get($statusId);
    }
}