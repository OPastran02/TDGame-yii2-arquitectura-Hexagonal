<?php

declare(strict_types=1);

namespace api\Core\Monster\Instance\Application\Query;

use api\Core\Monster\Instance\Domain\InstanceMonster;
use api\Core\Monster\Instance\Domain\Repository\IInstanceMonsterRepository;

class GetMonsterByIdHandler
{
    private IInstanceMonsterRepository $repository;

    public function __construct(IInstanceMonsterRepository $repository)
    {
        $this->repository = $repository;
    }
 
    public function __invoke(int $id): ?InstanceMonster
    {
        $hero = $this->repository->getbyId($id);
        return $hero;
    }
}