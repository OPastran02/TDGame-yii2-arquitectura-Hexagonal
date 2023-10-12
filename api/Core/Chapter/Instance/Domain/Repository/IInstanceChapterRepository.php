<?php   

namespace api\Core\Chapter\Instance\Domain\Repository;

use api\Core\Chapter\Instance\Domain\{
    InstanceChapter,
    InstanceChapters
};

interface IInstanceChapterRepository
{
    public function getbyIdPlayer(string $playerId): array;
    public function getbyChapter(string $idPlayer,int $idChapter): InstanceChapter;
    public function updateChapter($instanceChapter): InstanceChapter;
    public function create($instanceChapter): array; 
}