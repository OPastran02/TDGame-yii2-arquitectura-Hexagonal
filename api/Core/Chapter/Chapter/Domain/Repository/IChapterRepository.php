<?php   

namespace api\Core\Chapter\Chapter\Domain\Repository;

use api\Core\Chapter\Chapter\Domain\Chapter;
use api\Core\Chapter\Chapter\Domain\Chapters;

interface IChapterRepository
{
    /*
    *what can i do with a rarity?
    *just get, mandatory
    */
    
    public function getbyId(int $id): ?Chapter;


}