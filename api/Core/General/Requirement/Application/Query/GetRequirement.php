<?php

declare(strict_types=1);

namespace api\Core\General\Requirement\Application\Query;

use api\Core\General\Requirement\Domain\{
    Requirement,
    Repository\IRequirementRepository
};

class GetRequirement
{
    private IRequirementRepository $repository;

    public function __construct(IRequirementRepository $repository)
    {
        $this->repository = $repository;
    }
 
    public function __invoke(int $requirementId): ?Requirement
    {
        return $this->repository->get($requirementId);
    }
}