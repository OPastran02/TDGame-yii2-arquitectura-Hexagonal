<?php

declare(strict_types=1);

namespace api\Core\Rank\Rank\Application\Query;

use api\Core\Rank\Rank\Domain\Rank;
use api\Core\Rank\Rank\Domain\Repository\IRankRepository;

class GetRankByIdHandler
{
    private IRankRepository $repository;

    public function __construct(IRankRepository $repository)
    {
        $this->repository = $repository;
    }
 
    public function __invoke(int $id): ?Rank
    {
        $obj = $this->repository->getbyId($id);
        return $obj;
    }
}