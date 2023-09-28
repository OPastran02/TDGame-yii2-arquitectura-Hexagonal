<?php

declare(strict_types=1);

namespace api\Core\Chapter\Chapter\Application\Query;

use api\Core\Chapter\Chapter\Domain\Chapter;
use api\Core\Chapter\Chapter\Domain\Repository\IChapterRepository;

class GetChapterByIdHandler
{
    private IChapterRepository $repository;

    public function __construct(IChapterRepository $repository)
    {
        $this->repository = $repository;
    }
    
    public function __invoke(int $id): ?Chapter
    {
        $hero = $this->repository->getbyId($id);
        return $hero;
    }
}