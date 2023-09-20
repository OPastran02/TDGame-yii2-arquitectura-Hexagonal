<?php

declare(strict_types=1);

namespace api\Core\General\Stash\Application\Query;

use api\Core\General\Stash\Domain\Stash;
use api\Core\General\Stash\Domain\Repository\IStashRepository;

class GetStashByIdHandler
{
    private IStashRepository $repository;

    public function __construct(IStashRepository $repository)
    {
        $this->repository = $repository;
    }
 
    public function __invoke(int $id): ?Stash
    {
        $hero = $this->repository->getbyId($id);
        return $hero;
    }
}