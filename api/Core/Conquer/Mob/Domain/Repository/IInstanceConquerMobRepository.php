<?php   

namespace api\Core\Conquer\Mob\Domain\Repository;

use api\Core\Conquer\Mob\Domain\ConquerMob;
use api\Core\Conquer\Mob\Domain\ConquerMobs;

interface IConquerMobConquerRepository
{
    /*
    *what can i do with a World?
    *just get, mandatory
    */
    
    public function getbyId(int $id): ?ConquerMob;


}