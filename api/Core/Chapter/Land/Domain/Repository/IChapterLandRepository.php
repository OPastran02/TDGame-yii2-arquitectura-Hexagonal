<?php   

namespace api\Core\General\ChapterLand\Domain\Repository;

use api\Core\General\ChapterLand\Domain\ChapterLand;
use api\Core\General\ChapterLand\Domain\ChapterLands;

interface IChapterLandRepository
{
    /*
    *what can i do with a ChapterLand?
    *just get, mandatory
    */
    
    public function getbyId(int $id): ?ChapterLand;


}