<?php

declare(strict_types=1);

namespace api\Core\Chapter\Instance\Application\Query;

use api\Core\Chapter\Instance\Domain\{
    InstanceChapter,
    InstanceChapters,
    Repository\IInstanceChapterRepository
};

class GetInstanceChapterbyIdPlayer
{
    private IInstanceChapterRepository $repository;

    public function __construct(IInstanceChapterRepository $repository)
    {
        $this->repository = $repository;
    }
 
    public function __invoke(string $idPlayer): array
    {
        return $this->repository->getbyIdPlayer($idPlayer);
    }
}