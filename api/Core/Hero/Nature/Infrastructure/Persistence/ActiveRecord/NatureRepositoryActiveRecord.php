<?php

declare(strict_types=1);

namespace api\Core\Hero\Nature\Infrastructure\Persistence\ActiveRecord;

use api\Core\Hero\Nature\Domain\Nature;
use api\Core\Hero\Nature\Domain\Natures;
use api\Core\Hero\Nature\Domain\Repository\INatureRepository;
use common\models\Nature as Model;

class NatureRepositoryActiveRecord implements INatureRepository
{
    public function getbyId(int $id): ?Nature
    {
        $model = Model::findOne($id);

        if (!$model) {
            return null;
        }else{
            return Nature::fromPrimitives(...$model["attributes"]);
        }
    }
}
