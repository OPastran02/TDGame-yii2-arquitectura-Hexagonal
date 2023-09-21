<?php

declare(strict_types=1);

namespace api\Core\Monster\Monster\Application\Query;

use api\Core\Monster\Monster\Domain\Monster;
use api\Core\Monster\Monster\Domain\Repository\IMonsterRepository;

class GetMonsterByIdHandler
{
    private IMonsterRepository $repository;

    public function __construct(IMonsterRepository $repository)
    {
        $this->repository = $repository;
    }
 
    public function __invoke(int $id): ?Monster
    {
        $hero = $this->repository->getbyId($id);
        return $hero;
    }
}