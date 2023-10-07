<?php   

namespace api\Core\Chapter\Chapter\Domain\Repository;

use api\Core\Chapter\Chapter\Domain\Chapter;


interface IChapterRepository
{
    public function get(int $chapterId): ?Chapter;
}