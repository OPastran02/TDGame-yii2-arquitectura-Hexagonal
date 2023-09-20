<?php

declare(strict_types=1);

namespace api\Core\Conquer\World\Infrastructure\Persistence\ActiveRecord;

use api\Core\Conquer\World\Domain\ConquerWorld;
use api\Core\Conquer\World\Domain\ConquerWorlds;
use api\Core\Conquer\World\Domain\Repository\IConquerWorldRepository;
use common\models\ConquerWorld as Model;

class ConquerWorldRepositoryActiveRecord implements IConquerWorldRepository
{
    public function getbyId(int $id): ?ConquerWorld
    {
        $model = Model::findOne($id);

        if (!$model) {
            return null;
        }else{
            return ConquerWorld::fromPrimitives(...$model["attributes"]);
        }
    }
}
