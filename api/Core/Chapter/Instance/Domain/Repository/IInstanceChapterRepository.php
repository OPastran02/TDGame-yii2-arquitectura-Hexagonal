<?php   

namespace api\Core\Chapter\Instance\Domain\Repository;

use api\Core\Chapter\Instance\Domain\{
    InstanceChapter,
    InstanceChapters
};

interface IInstanceChapterRepository
{
    public function getbyIdPlayer(string $playerId): array;
}