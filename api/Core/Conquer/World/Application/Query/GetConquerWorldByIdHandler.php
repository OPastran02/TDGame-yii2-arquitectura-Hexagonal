<?php

declare(strict_types=1);

namespace api\Core\Conquer\World\Application\Query;

use api\Core\Conquer\World\Domain\ConquerWorld;
use api\Core\Conquer\World\Domain\Repository\IConquerWorldRepository;

class GetConquerWorldByIdHandler
{
    private IConquerWorldRepository $repository;

    public function __construct(IConquerWorldRepository $repository)
    {
        $this->repository = $repository;
    }
 
    public function __invoke(int $id): ?ConquerWorld
    {
        $hero = $this->repository->getbyId($id);
        return $hero;
    }
}