<?php   

namespace api\Core\General\Requirement\Domain\Repository;

use api\Core\General\Requirement\Domain\Requirement;

interface IRequirementRepository
{
    public function get(int $requirementId): ?Requirement;
}