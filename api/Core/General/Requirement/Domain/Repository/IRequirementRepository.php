<?php   

namespace api\Core\General\Requirement\Domain\Repository;

use api\Core\General\Requirement\Domain\Requirement;
use api\Core\General\Requirement\Domain\Requirements;

interface IRequirementRepository
{
    /*
    *what can i do with an objeto?
    *just get it by id, because its the visual parameters of another entity.
    *
    *get by Available?
    */
    
    public function getbyId(int $id): ?Requirement;


}