<?php

declare(strict_types=1);

namespace api\Core\General\ChapterLand\Application\Query;

use api\Core\General\ChapterLand\Domain\ChapterLand;
use api\Core\General\ChapterLand\Domain\Repository\IChapterLandRepository;

class GetChapterLandByIdHandler
{
    private IChapterLandRepository $repository;

    public function __construct(IChapterLandRepository $repository)
    {
        $this->repository = $repository;
    }
 
    public function __invoke(int $id): ?ChapterLand
    {
        $hero = $this->repository->getbyId($id);
        return $hero;
    }
}