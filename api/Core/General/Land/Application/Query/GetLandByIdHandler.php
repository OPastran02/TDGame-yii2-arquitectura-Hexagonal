<?php

declare(strict_types=1);

namespace api\Core\General\Land\Application\Query;

use api\Core\General\Land\Domain\Land;
use api\Core\General\Land\Domain\Repository\ILandRepository;

class GetLandByIdHandler
{
    private ILandRepository $repository;

    public function __construct(ILandRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(string $id): ?Land
    {
        $obj = $this->repository->getbyId($id);
        return $obj;
    }
}