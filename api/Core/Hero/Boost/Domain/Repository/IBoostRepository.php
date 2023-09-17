<?php   

namespace api\Core\General\Boost\Domain\Repository;

use api\Core\General\Boost\Domain\Boost;
use api\Core\General\Boost\Domain\Boosts;

interface IBoostRepository
{
    /*
    *what can i do with a Boost?
    *just get, mandatory
    */
    
    public function getbyId(int $id): ?Rarity;


}