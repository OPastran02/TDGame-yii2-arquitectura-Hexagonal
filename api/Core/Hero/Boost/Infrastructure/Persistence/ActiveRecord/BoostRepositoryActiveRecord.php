<?php

declare(strict_types=1);

namespace api\Core\Hero\Boost\Infrastructure\Persistence\ActiveRecord;

use api\Core\Hero\Boost\Domain\Boost;
use api\Core\Hero\Boost\Domain\Boosts;
use api\Core\Hero\Boost\Domain\Repository\IBoostRepository;
use common\models\Boost as Model;

class BoostRepositoryActiveRecord implements IBoostRepository
{
    public function getbyId(int $id): ?Boost
    {
        $model = Model::findOne($id);

        if (!$model) {
            return null;
        }else{
            return Boost::fromPrimitives(...$model["attributes"]);
        }
    }
    
}
