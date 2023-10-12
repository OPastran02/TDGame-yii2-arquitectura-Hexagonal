<?php   

namespace api\Core\Chapter\Land\Domain\Repository;

use api\Core\Chapter\Land\Domain\ChapterLand;

interface IChapterLandRepository
{
    public function get(int $ChapterLandId): ?ChapterLand;
}