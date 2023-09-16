<?php

declare(strict_types=1);

namespace api\Core\General\Stat\Application\Query;

use api\Core\General\Stat\Domain\Stat;
use api\Core\General\Stat\Domain\Repository\IStatRepository;

class GetStatByIdHandler
{
    private IStatRepository $repository;

    public function __construct(IStatRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(string $id): ?Stat
    {
        $obj = $this->repository->getbyId($id);
        return $obj;
    }
}