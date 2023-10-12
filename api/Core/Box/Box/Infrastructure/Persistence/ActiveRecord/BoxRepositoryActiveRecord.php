<?php

declare(strict_types=1);

namespace api\Core\Box\Box\Infrastructure\Persistence\ActiveRecord;

use api\Core\Box\Box\Domain\{
    Box,
    Repository\IBoxRepository
};
use common\models\Box as Model;
use api\Core\General\Object\Domain\Objeto;
use api\Core\General\Requirement\Domain\Requirement;
use api\Core\Hero\Race\Domain\Race;

class BoxRepositoryActiveRecord implements IBoxRepository
{
    public function get(int $boxId): ?Box
    {
        $model = Model::find()
            ->with('object') 
            ->with('requirements')
            ->where(['id' => $boxId])
            ->one();

        if (!$model) return null;

        $objeto = Objeto::fromPrimitives(...$model["object"]["attributes"]);
        $requirement = Requirement::fromPrimitives(...$model["requirements"]["attributes"]);

        return Box::fromPrimitives(
            $model["id"],
            $model["idObject"],
            $model["booster"],
            $model["bronze"],
            $model["silver"],
            $model["gold"],
            $model["crystal"],
            $model["idRequirements"],
            $model["idRace"],
            $model["available"],
            $objeto,
            $requirement,
        );
    }
}
