<?php   

namespace api\Core\Hero\Hero\Domain\Repository;

use api\Core\Hero\Hero\Domain\Hero;

interface IHeroRepository
{
    /*
    *what can i do with a rarity?
    *just get, mandatory
    */
    
    public function getbyId(int $id): ?Box;


}