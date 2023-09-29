<?php   

namespace api\Core\Hero\Ability\Domain\Repository;

use api\Core\Hero\Ability\Domain\Ability;

interface IAbilityRepository
{
    public function get(int $abilityId): ?Ability;
}