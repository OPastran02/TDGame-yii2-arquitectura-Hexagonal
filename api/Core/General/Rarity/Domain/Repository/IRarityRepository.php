<?php   

namespace api\Core\General\Rarity\Domain\Repository;

use api\Core\General\Rarity\Domain\Rarity;
use api\Core\General\Rarity\Domain\Rarities;

interface IRarityRepository
{
    /*
    *what can i do with a rarity?
    *just get, mandatory
    */
    
    public function getbyId(int $id): ?Rarity;


}