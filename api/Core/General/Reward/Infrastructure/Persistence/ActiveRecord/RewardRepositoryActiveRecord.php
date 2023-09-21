<?php

declare(strict_types=1);

namespace api\Core\General\Reward\Infrastructure\Persistence\ActiveRecord;

use api\Core\General\Reward\Domain\Reward;
use api\Core\General\Reward\Domain\Rewards;
use api\Core\General\Reward\Domain\Repository\IRewardRepository;
use common\models\Reward as Model;

class RewardRepositoryActiveRecord implements IRewardRepository
{
    public function getbyId(int $id): ?Reward
    {
        $model = Model::findOne($id);

        if (!$model) {
            return null;
        }else{
            return Reward::fromPrimitives(...$model["attributes"]);
        }
    }
}
