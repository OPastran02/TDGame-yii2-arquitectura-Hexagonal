<?php

declare(strict_types=1);

namespace api\Core\Chapter\Instance\Application\Query;

use api\Core\Chapter\Instance\Domain\{
    InstanceChapter,
    InstanceChapters,
    Repository\IInstanceChapterRepository
};

class GetInstanceChapterByChapter
{
    private IInstanceChapterRepository $repository;

    public function __construct(IInstanceChapterRepository $repository)
    {
        $this->repository = $repository;
    }
 
    public function __invoke(string $idPlayer,int $idChapter): array
    {
        return $this->repository->getbyChapter($idPlayer,$idChapter);
    }
}