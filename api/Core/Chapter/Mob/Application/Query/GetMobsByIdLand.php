<?php

declare(strict_types=1);

namespace api\Core\Chapter\Mob\Application\Query;

use api\Core\Chapter\Mob\Domain\{
    ChapterMob,
    Repository\IChapterMobRepository
};

class GetMobsByIdLand
{
    private IChapterMobRepository $repository;

    public function __construct(IChapterMobRepository $repository)
    {
        $this->repository = $repository;
    }
 
    public function __invoke(string $landId): ?array
    {
        return $this->repository->getbyIdLand($landId);
    }
}