<?php

declare(strict_types=1);

namespace api\Core\General\World\Infrastructure\Persistence\ActiveRecord;

use api\Core\General\World\Domain\World;
use api\Core\General\World\Domain\Worlds;
use api\Core\General\World\Domain\Repository\IWorldRepository;
use common\models\World as Model;

class WorldRepositoryActiveRecord implements IWorldRepository
{
    public function getbyId(int $id): ?World
    {
        $model = Model::findOne($id);

        if (!$model) {
            return null;
        }else{
            return World::fromPrimitives(...$model["attributes"]);
        }
    }
}
