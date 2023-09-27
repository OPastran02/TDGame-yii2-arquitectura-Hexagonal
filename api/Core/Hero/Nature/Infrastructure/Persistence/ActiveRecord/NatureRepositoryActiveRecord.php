<?php

declare(strict_types=1);

namespace api\Core\Hero\Nature\Infrastructure\Persistence\ActiveRecord;

use api\Core\Hero\Nature\Domain\Nature;
use api\Core\Hero\Nature\Domain\Natures;
use api\Core\Hero\Nature\Domain\Repository\INatureRepository;
use api\Core\General\Object\Domain\Objeto; 
use api\Core\Hero\Boost\Domain\Boost; 
use common\models\Nature as Model;

class NatureRepositoryActiveRecord implements INatureRepository
{
    public function getbyId(int $id): ?Nature
    {

        $model = Model::find()
            ->with('boost')  // Carga la relación "boost"
            ->with('object') // Carga la relación "object"
            ->where(['id' => $id])
            ->one();

        if (!$model) {
            return null;
        }

        

        $objeto = Objeto::fromPrimitives(...$model["object"]["attributes"]);

        $boost = Boost::fromPrimitives(...$model["boost"]["attributes"]);

        return Nature::fromPrimitives(
            $model['id'],
            $model['idObject'],
            $model['idBoost'],
            $model['available'],
            $objeto,
            $boost
        );
    }
}
