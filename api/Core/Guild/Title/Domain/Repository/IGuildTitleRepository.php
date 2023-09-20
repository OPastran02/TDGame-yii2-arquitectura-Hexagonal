<?php   

namespace api\Core\General\GuildTitle\Domain\Repository;

use api\Core\General\GuildTitle\Domain\GuildTitle;
use api\Core\General\GuildTitle\Domain\GuildTitles;

interface IGuildTitleRepository
{
    /*
    *what can i do with a GuildTitle?
    *just get, mandatory
    */
    
    public function getbyId(int $id): ?GuildTitle;


}