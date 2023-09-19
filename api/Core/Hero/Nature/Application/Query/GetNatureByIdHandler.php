<?php

declare(strict_types=1);

namespace api\Core\Hero\Nature\Application\Query;

use api\Core\Hero\Nature\Domain\Nature;
use api\Core\Hero\Nature\Domain\Repository\INatureRepository;

class GetNatureByIdHandler
{
    private INatureRepository $repository;

    public function __construct(INatureRepository $repository)
    {
        $this->repository = $repository;
    }
 
    public function __invoke(int $id): ?Nature
    {
        $obj = $this->repository->getbyId($id);
        return $obj;
    }
}