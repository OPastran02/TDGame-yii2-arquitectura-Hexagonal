<?php

declare(strict_types=1);

namespace api\Core\Hero\Ability\Application\Query;

use api\Core\Hero\Ability\Domain\{
    Ability,
    Repository\IAbilityRepository
};

class GetAbility
{
    private IAbilityRepository $repository;

    public function __construct(IAbilityRepository $repository)
    {
        $this->repository = $repository;
    }
 
    public function __invoke(int $abilityId): ?Ability
    {
        return $this->repository->getbyId($abilityId);
    }
}