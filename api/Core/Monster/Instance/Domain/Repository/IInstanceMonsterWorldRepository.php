<?php   

namespace api\Core\Monster\Instance\Domain\Repository;

use api\Core\Monster\Instance\Domain\InstanceMonster;
use api\Core\Monster\Instance\Domain\InstanceMonsters;

interface IInstanceMonsterRepository
{
    /*
    *what can i do with a World?
    *just get, mandatory
    */
    
    public function getbyId(int $id): ?InstanceMonster;


}