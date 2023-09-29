<?php

declare(strict_types=1);

namespace api\Core\Hero\Boost\Infrastructure\Persistence\ActiveRecord;

use api\Core\Hero\Boost\Domain\{
    Boost,
    Repository\IBoostRepository
};
use common\models\Boost as Model;

class BoostRepositoryActiveRecord implements IBoostRepository
{
    public function get(int $boostId): ?Boost
    {
        $model = Model::findOne($boostId);
        if (!$model) return null;
        return Boost::fromPrimitives(...$model["attributes"]);
    }
    
}
