<?php

declare(strict_types=1);

namespace api\Core\General\Membership\Application\Query;

use api\Core\General\Membership\Domain\Membership;
use api\Core\General\Membership\Domain\Repository\IMembershipRepository;

class GetMembershipByIdHandler
{
    private IMembershipRepository $repository;

    public function __construct(IMembershipRepository $repository)
    {
        $this->repository = $repository;
    }
 
    public function __invoke(int $id): ?Membership
    {
        $hero = $this->repository->getbyId($id);
        return $hero;
    }
}