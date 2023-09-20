<?php   

namespace api\Core\Conquer\World\Domain\Repository;

use api\Core\Conquer\World\Domain\ConquerWorld;
use api\Core\Conquer\World\Domain\ConquerWorlds;

interface IConquerWorldepository
{
    /*
    *what can i do with a World?
    *just get, mandatory
    */
    
    public function getbyId(int $id): ?ConquerWorld;


}