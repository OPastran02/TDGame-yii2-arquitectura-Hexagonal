<?php

declare(strict_types=1);

namespace api\Core\Chapter\Land\Application\Query;

use api\Core\Chapter\Land\Domain\{
    ChapterLand,
    Repository\IChapterLandRepository
};

class GetLand
{
    private IChapterLandRepository $repository;

    public function __construct(IChapterLandRepository $repository)
    {
        $this->repository = $repository;
    }
 
    public function __invoke(int $ChapterLandId): ?ChapterLand
    {
        return $this->repository->get($ChapterLandId);
    }
}