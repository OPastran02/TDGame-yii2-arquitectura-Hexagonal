<?php

declare(strict_types=1);

namespace api\Core\Chapter\Mob\Application\Query;

use api\Core\Chapter\Mob\Domain\ChapterMob;
use api\Core\Chapter\Mob\Domain\Repository\IChapterMobRepository;

class GetChapterMobByIdHandler
{
    private IChapterMobRepository $repository;

    public function __construct(IChapterMobRepository $repository)
    {
        $this->repository = $repository;
    }
 
    public function __invoke(int $id): ?ChapterMob
    {
        $hero = $this->repository->getbyId($id);
        return $hero;
    }
}