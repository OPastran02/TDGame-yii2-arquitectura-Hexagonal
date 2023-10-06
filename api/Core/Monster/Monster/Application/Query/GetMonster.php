<?php

declare(strict_types=1);

namespace api\Core\Monster\Monster\Application\Query;

use api\Core\Monster\Monster\Domain\{
    Monster,
    Repository\IMonsterRepository
};

class GetMonster
{
    private IMonsterRepository $repository;

    public function __construct(IMonsterRepository $repository)
    {
        $this->repository = $repository;
    }
 
    public function __invoke(int $monsterId): ?Monster
    {
        return $this->repository->get($monsterId);
    }
}