<?php   

declare(strict_types=1);

namespace api\Core\General\Rarity\Domain\Repository;

use api\Core\General\Rarity\Domain\Rarity;

interface IRarityRepository
{
    /*
    *what can i do with a rarity?
    *just get, mandatory
    */
    
    public function getbyId(int $id): ?Rarity;


}