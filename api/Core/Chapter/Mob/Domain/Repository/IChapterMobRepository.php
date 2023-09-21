<?php   

namespace api\Core\Chapter\Mob\Domain\Repository;

use api\Core\Chapter\Mob\Domain\ChapterMob;
use api\Core\Chapter\Mob\Domain\ChapterMobs;

interface IChapterMobRepository
{
    /*
    *what can i do with a World?
    *just get, mandatory
    */
    
    public function getbyId(int $id): ?ChapterMob;


}