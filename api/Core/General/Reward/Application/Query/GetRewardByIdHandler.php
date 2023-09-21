<?php

declare(strict_types=1);

namespace api\Core\General\Reward\Application\Query;

use api\Core\General\Reward\Domain\Reward;
use api\Core\General\Reward\Domain\Repository\IRewardRepository;

class GetRewardByIdHandler
{
    private IRewardRepository $repository;

    public function __construct(IRewardRepository $repository)
    {
        $this->repository = $repository;
    }
 
    public function __invoke(int $id): ?Reward
    {
        $hero = $this->repository->getbyId($id);
        return $hero;
    }
}