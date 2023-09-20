<?php   

namespace api\Core\Conquer\Land\Domain\Repository;

use api\Core\Conquer\Land\Domain\ConquerLand;
use api\Core\Conquer\Land\Domain\ConquerLands;

interface IConquerLandConquerRepository
{
    /*
    *what can i do with a World?
    *just get, mandatory
    */
    
    public function getbyId(int $id): ?ConquerLand;


}