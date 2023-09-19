<?php

declare(strict_types=1);

namespace api\Core\Hero\Ability\Application\Query;

use api\Core\Hero\Ability\Domain\Ability;
use api\Core\Hero\Ability\Domain\Repository\IAbilityRepository;

class GetAbilityByIdHandler
{
    private IAbilityRepository $repository;

    public function __construct(IAbilityRepository $repository)
    {
        $this->repository = $repository;
    }
 
    public function __invoke(int $id): ?Ability
    {
        $obj = $this->repository->getbyId($id);
        return $obj;
    }
}