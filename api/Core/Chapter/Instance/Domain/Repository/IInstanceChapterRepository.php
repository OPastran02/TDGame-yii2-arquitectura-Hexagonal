<?php   

namespace api\Core\Chapter\Instance\Domain\Repository;

use api\Core\Chapter\Instance\Domain\{
    InstanceChapter,
    InstanceChapters
};

interface IInstanceChapterRepository
{
    public function getbyIdPlayer(string $playerId): array;
    public function getbyChapter(string $idPlayer,int $idChapter): array;
    public function updateChapter(string $idPlayer,int $idChapter, int $win, int $stars): array;
    public function create($instanceChapter): array; 
}