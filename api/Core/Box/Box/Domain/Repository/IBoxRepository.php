<?php   

namespace api\Core\Box\Box\Domain\Repository;

use api\Core\Box\Box\Domain\Box;
use api\Core\Box\Box\Domain\Boxs;

interface IBoxRepository
{
    /*
    *what can i do with a rarity?
    *just get, mandatory
    */
    
    public function getbyId(int $id): ?Box;


}