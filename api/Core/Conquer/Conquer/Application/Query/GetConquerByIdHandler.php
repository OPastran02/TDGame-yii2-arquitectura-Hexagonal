<?php

declare(strict_types=1);

namespace api\Core\Conquer\Conquer\Application\Query;

use api\Core\Conquer\Conquer\Domain\Conquer;
use api\Core\Conquer\Conquer\Domain\Repository\IConquerRepository;

class GetConquerByIdHandler
{
    private IConquerRepository $repository;

    public function __construct(IConquerRepository $repository)
    {
        $this->repository = $repository;
    }
 
    public function __invoke(int $id): ?Conquer
    {
        $hero = $this->repository->getbyId($id);
        return $hero;
    }
}