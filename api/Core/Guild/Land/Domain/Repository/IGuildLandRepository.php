<?php   

namespace api\Core\General\GuildLand\Domain\Repository;

use api\Core\General\GuildLand\Domain\GuildLand;
use api\Core\General\GuildLand\Domain\GuildLands;

interface IGuildLandRepository
{
    /*
    *what can i do with a GuildLand?
    *just get, mandatory
    */
    
    public function getbyId(int $id): ?GuildLand;


}