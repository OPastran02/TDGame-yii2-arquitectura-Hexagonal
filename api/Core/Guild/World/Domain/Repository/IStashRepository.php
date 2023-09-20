<?php   

namespace api\Core\General\World\Domain\Repository;

use api\Core\General\World\Domain\World;
use api\Core\General\World\Domain\Worlds;

interface IWorldRepository
{
    /*
    *what can i do with a World?
    *just get, mandatory
    */
    
    public function getbyId(int $id): ?World;


}