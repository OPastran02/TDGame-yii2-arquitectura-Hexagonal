<?php

declare(strict_types=1);

namespace api\Core\General\Reward\Infrastructure\Persistence\ActiveRecord;

use api\Core\General\Reward\Domain\{
    Reward,
    Repository\IRewardRepository
};
use api\Core\General\Object\Domain\Objeto;
use common\models\Reward as Model;

class RewardRepositoryActiveRecord implements IRewardRepository
{
    public function get(int $rewardId): ?Reward
    {
        $model = Model::find()
            ->with('object') 
            ->where(['id' => $rewardId])
            ->one();

        if (!$model) return null;

        $objeto = Objeto::fromPrimitives(...$model["object"]["attributes"]);

        return Reward::fromPrimitives(
            $model['id'],
            $model['idObject'],
            $model['bronze'],
            $model['silver'],
            $model['gold'],
            $model['crystal'],
            $model['quantity'],
            $model['available'],
            $objeto
        );
    }
}
