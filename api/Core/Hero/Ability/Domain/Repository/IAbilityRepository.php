<?php   

namespace api\Core\Hero\Ability\Domain\Repository;

use api\Core\Hero\Ability\Domain\Ability;
use api\Core\Hero\NaAbilityture\Domain\Abilities;

interface IAbilityRepository
{
    /*
    *what can i do with a Type?
    *just get, mandatory
    */
    
    public function getbyId(int $id): ?Ability;


}