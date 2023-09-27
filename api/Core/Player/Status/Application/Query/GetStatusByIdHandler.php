<?php

declare(strict_types=1);

namespace api\Core\Player\Status\Application\Query;

use api\Core\Player\Status\Domain\Status;
use api\Core\Player\Status\Domain\Repository\IStatusRepository;

class GetStatusByIdHandler
{
    private IStatusRepository $repository;

    public function __construct(IStatusRepository $repository)
    {
        $this->repository = $repository;
    }
 
    public function __invoke(string $id): ?Status
    {
        $obj = $this->repository->getbyId($id);
        return $obj;
    }
}