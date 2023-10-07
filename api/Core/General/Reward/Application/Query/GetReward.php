<?php

declare(strict_types=1);

namespace api\Core\General\Reward\Application\Query;

use api\Core\General\Reward\Domain\{
    Reward,
    Repository\IRewardRepository
};

class GetReward
{
    private IRewardRepository $repository;

    public function __construct(IRewardRepository $repository)
    {
        $this->repository = $repository;
    }
 
    public function __invoke(int $rewardId): ?Reward
    {
        return $this->repository->get($rewardId);
    }
}