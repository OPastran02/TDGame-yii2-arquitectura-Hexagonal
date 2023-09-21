<?php   

namespace api\Core\Chapter\Instance\Domain\Repository;

use api\Core\Chapter\Instance\Domain\InstanceChapter;
use api\Core\Chapter\Instance\Domain\InstanceChapters;

interface IInstanceChapterRepository
{
    /*
    *what can i do with a World?
    *just get, mandatory
    */
    
    public function getbyId(int $id): ?InstanceChapter;


}