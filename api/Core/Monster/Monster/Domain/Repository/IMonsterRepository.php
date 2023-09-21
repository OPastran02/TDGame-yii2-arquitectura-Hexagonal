<?php   

namespace api\Core\Monster\Monster\Domain\Repository;

use api\Core\Monster\Monster\Domain\Monster;
use api\Core\Monster\Monster\Domain\Monsters;

interface IMonsterRepository
{
    /*
    *what can i do with a rarity?
    *just get, mandatory
    */
    
    public function getbyId(int $id): ?Monster;


}