<?php   

namespace api\Core\General\Reward\Domain\Repository;

use api\Core\General\Reward\Domain\Reward;

interface IRewardRepository
{
    public function get(int $id): ?Reward;
}