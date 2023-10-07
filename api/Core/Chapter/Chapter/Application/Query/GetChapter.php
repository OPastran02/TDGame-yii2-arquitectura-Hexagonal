<?php

declare(strict_types=1);

namespace api\Core\Chapter\Chapter\Application\Query;

use api\Core\Chapter\Chapter\Domain\{
    Chapter,
    Repository\IChapterRepository
};

class GetChapter
{
    private IChapterRepository $repository;

    public function __construct(IChapterRepository $repository)
    {
        $this->repository = $repository;
    }
    
    public function __invoke(int $chapterId): ?Chapter
    {
        return $this->repository->get($chapterId);
    }
}