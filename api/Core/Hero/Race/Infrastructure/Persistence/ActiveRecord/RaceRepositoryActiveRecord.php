<?php

declare(strict_types=1);

namespace api\Core\Hero\Race\Infrastructure\Persistence\ActiveRecord;

use api\Core\Hero\Race\Domain\{
    Race,
    Repository\IRaceRepository
};
use api\Core\General\Object\Domain\Objeto; 
use api\Core\Hero\Boost\Domain\Boost; 
use common\models\Race as Model;

class RaceRepositoryActiveRecord implements IRaceRepository
{
    public function get(int $raceId): ?Race
    {

        $model = Model::find()
            ->with('boost')  // Carga la relación "boost"
            ->with('object') // Carga la relación "object"
            ->where(['id' => $raceId])
            ->one();

        if (!$model) {
            return null;
        }

        $objeto = Objeto::fromPrimitives(...$model["object"]["attributes"]);
        $boost = Boost::fromPrimitives(...$model["boost"]["attributes"]);

        return Race::fromPrimitives(
            $model['id'],
            $model['idObject'],
            $model['idBoost'],
            $model['available'],
            $objeto,
            $boost
        );
    }
}
