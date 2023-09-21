<?php

declare(strict_types=1);

namespace api\Core\Box\Box\Application\Query;

use api\Core\Box\Box\Domain\Box;
use api\Core\Box\Box\Domain\Repository\IBoxRepository;

class GetBoxByIdHandler
{
    private IBoxRepository $repository;

    public function __construct(IBoxRepository $repository)
    {
        $this->repository = $repository;
    }
 
    public function __invoke(int $id): ?Box
    {
        $hero = $this->repository->getbyId($id);
        return $hero;
    }
}