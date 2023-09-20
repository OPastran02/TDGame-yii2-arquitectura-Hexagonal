<?php

declare(strict_types=1);

namespace api\Core\Conquer\Instance\Application\Query;

use api\Core\Conquer\Instance\Domain\InstanceConquer;
use api\Core\Conquer\Instance\Domain\Repository\IInstanceConquerRepository;

class GetConquerByIdHandler
{
    private IInstanceConquerRepository $repository;

    public function __construct(IInstanceConquerRepository $repository)
    {
        $this->repository = $repository;
    }
 
    public function __invoke(int $id): ?InstanceConquer
    {
        $hero = $this->repository->getbyId($id);
        return $hero;
    }
}