<?php

declare(strict_types=1);

namespace api\Core\General\Requirement\Application\Query;

use api\Core\General\Requirement\Domain\Requirement;
use api\Core\General\Requirement\Domain\Repository\IRequirementRepository;

class GetRequirementByIdHandler
{
    private IRequirementRepository $repository;

    public function __construct(IRequirementRepository $repository)
    {
        $this->repository = $repository;
    }
 
    public function __invoke(int $id): ?Requirement
    {
        $hero = $this->repository->getbyId($id);
        return $hero;
    }
}