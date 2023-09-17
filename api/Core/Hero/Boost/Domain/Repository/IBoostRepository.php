<?php   

namespace api\Core\Hero\Boost\Domain\Repository;

use api\Core\Hero\Boost\Domain\Boost;
use api\Core\Hero\Boost\Domain\Boosts;

interface IBoostRepository
{
    /*
    *what can i do with a Boost?
    *just get, mandatory
    */
    
    public function getbyId(int $id): ?Boost;


}