<?php

declare(strict_types=1);

namespace api\Core\Hero\Race\Infrastructure\Persistence\ActiveRecord;

use api\Core\Hero\Race\Domain\Race;
use api\Core\Hero\Race\Domain\Races;
use api\Core\Hero\Race\Domain\Repository\IRaceRepository;
use common\models\Race as Model;

class RaceRepositoryActiveRecord implements IRaceRepository
{
    public function getbyId(int $id): ?Race
    {
        $model = Model::findOne($id);

        if (!$model) {
            return null;
        }else{
            return Race::fromPrimitives(...$model["attributes"]);
        }
    }
}
