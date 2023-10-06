<?php

declare(strict_types=1);

namespace api\Core\Guild\Membership\Application\Query;

use api\Core\Guild\Membership\Domain\{
    Membership,
    Repository\IMembershipRepository
};

class GetMembership
{
    private IMembershipRepository $repository;

    public function __construct(IMembershipRepository $repository)
    {
        $this->repository = $repository;
    }
 
    public function __invoke(int $id): ?Membership
    {
        return $this->repository->get($id);
    }
}