<?php

declare(strict_types=1);

namespace api\Core\Conquer\Mob\Application\Query;

use api\Core\Conquer\Mob\Domain\ConquerMob;
use api\Core\Conquer\Mob\Domain\Repository\IConquerMobRepository;

class GetConquerMobByIdHandler
{
    private IConquerMobRepository $repository;

    public function __construct(IConquerMobRepository $repository)
    {
        $this->repository = $repository;
    }
 
    public function __invoke(int $id): ?ConquerMob
    {
        $hero = $this->repository->getbyId($id);
        return $hero;
    }
}