<?php

declare(strict_types=1);

// Implementación del repositorio de lectura
namespace api\Core\General\Land\Infrastructure\Persistence\ActiveRecord;

use api\Core\General\Land\Domain\Land;
use api\Core\General\Land\Domain\Repository\ILandReadRepository;
use common\models\Land as Model;
use api\Core\General\Object\Domain\Objeto;

class LandReadRepositoryActiveRecord implements ILandReadRepository
{
    public function get(string $landId): ?Land
    {
        $model = Model::find()
            ->with('object') // Carga la relación "object"
            ->where(['id' => $landId])
            ->one();
        
        if (!$model) return null;

        $objeto = Objeto::fromPrimitives(...$model["object"]["attributes"]);

        return Land::fromPrimitives(
            $model['id'],
            $model['height'],
            $model['weight'],
            $model['gridMap'],
            $model['order'],
            $model['idObject'],
            $model['chat'],
            $model['available'],
            $objeto,
        );
    }

}
