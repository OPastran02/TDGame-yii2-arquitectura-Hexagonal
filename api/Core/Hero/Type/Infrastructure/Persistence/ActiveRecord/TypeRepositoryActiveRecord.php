<?php

declare(strict_types=1);

namespace api\Core\Hero\Type\Infrastructure\Persistence\ActiveRecord;

use api\Core\Hero\Type\Domain\{
    Type,
    Repository\ITypeRepository
};
use api\Core\General\Object\Domain\Objeto; 
use api\Core\Hero\Boost\Domain\Boost; 
use common\models\Type as Model;

class TypeRepositoryActiveRecord implements ITypeRepository
{
    public function getbyId(int $typeId): ?Type
    {

        $model = Model::find()
            ->with('boost')  // Carga la relación "boost"
            ->with('object') // Carga la relación "object"
            ->where(['id' => $typeId])
            ->one();

        if (!$model) return null;

        $objeto = Objeto::fromPrimitives(...$model["object"]["attributes"]);
        $boost = Boost::fromPrimitives(...$model["boost"]["attributes"]);

        return Type::fromPrimitives(
            $model['id'],
            $model['idObject'],
            $model['horoscope'],
            $model['idBoost'],
            $model['available'],
            $objeto,
            $boost
        );
    }
}
