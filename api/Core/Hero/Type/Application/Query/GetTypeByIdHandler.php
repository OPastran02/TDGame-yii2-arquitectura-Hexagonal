<?php

declare(strict_types=1);

namespace api\Core\Hero\Type\Application\Query;

use api\Core\Hero\Type\Domain\Type;
use api\Core\Hero\Type\Domain\Repository\ITypeRepository;

class GetTypeByIdHandler
{
    private ITypeRepository $repository;

    public function __construct(ITypeRepository $repository)
    {
        $this->repository = $repository;
    }
 
    public function __invoke(int $id): ?Type
    {
        $hero = $this->repository->getbyId($id);
        return $hero;
    }
}