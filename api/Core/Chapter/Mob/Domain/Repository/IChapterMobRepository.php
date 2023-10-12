<?php   

namespace api\Core\Chapter\Mob\Domain\Repository;

use api\Core\Chapter\Mob\Domain\ChapterMob;

interface IChapterMobRepository
{
    public function getbyIdLand(string $landId): ?array;
}