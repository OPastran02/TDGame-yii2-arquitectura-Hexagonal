<?php

declare(strict_types=1);

namespace api\Core\Hero\Type\Application\Query;

use api\Core\Hero\Type\Domain\{
    Type,
    Repository\ITypeRepository
};

class GetType
{
    private ITypeRepository $repository;

    public function __construct(ITypeRepository $repository)
    {
        $this->repository = $repository;
    }
 
    public function __invoke(int $typeId): ?Type
    {
        return $this->repository->getbyId($typeId);  
    }
}