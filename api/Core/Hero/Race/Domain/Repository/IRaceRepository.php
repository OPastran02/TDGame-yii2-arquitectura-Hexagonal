<?php   

namespace api\Core\Hero\Race\Domain\Repository;

use api\Core\Hero\Race\Domain\Race;
use api\Core\Hero\Race\Domain\Races;

interface IRaceRepository
{
    /*
    *what can i do with a Type?
    *just get, mandatory
    */
    
    public function getbyId(int $id): ?Race;


}