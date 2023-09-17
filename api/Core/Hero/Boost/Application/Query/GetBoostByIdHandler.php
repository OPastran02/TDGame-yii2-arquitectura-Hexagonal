<?php

declare(strict_types=1);

namespace api\Core\General\Boost\Application\Query;

use api\Core\General\Boost\Domain\Boost;
use api\Core\General\Boost\Domain\Repository\IBoostRepository;

class GetBoostByIdHandler
{
    private IBoostRepository $repository;

    public function __construct(IBoostRepository $repository)
    {
        $this->repository = $repository;
    }
 
    public function __invoke(int $id): ?Boost
    {
        $hero = $this->repository->getbyId($id);
        return $hero;
    }
}