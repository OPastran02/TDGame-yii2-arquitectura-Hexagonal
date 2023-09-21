<?php

declare(strict_types=1);

namespace api\Core\Chapter\Instance\Application\Query;

use api\Core\Chapter\Instance\Domain\InstanceChapter;
use api\Core\Chapter\Instance\Domain\Repository\IInstanceChapterRepository;

class GetChapterByIdHandler
{
    private IInstanceChapterRepository $repository;

    public function __construct(IInstanceChapterRepository $repository)
    {
        $this->repository = $repository;
    }
 
    public function __invoke(int $id): ?InstanceChapter
    {
        $hero = $this->repository->getbyId($id);
        return $hero;
    }
}