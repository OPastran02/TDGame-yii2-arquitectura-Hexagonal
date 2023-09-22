<?php

declare(strict_types=1);

namespace api\Core\Hero\Hero\Application\Query;

use api\Core\Hero\Hero\Domain\Hero;
use api\Core\Hero\Hero\Domain\Repository\IHeroRepository;

class GetHeroByIdHandler
{
    private IHeroRepository $repository;

    public function __construct(IHeroRepository $repository)
    {
        $this->repository = $repository;
    }
 
    public function __invoke(int $id): ?Hero
    {
        $obj = $this->repository->getbyId($id);
        return $obj;
    }
}