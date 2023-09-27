<?php

declare(strict_types=1);

namespace api\Core\General\Object\Infrastructure\Persistence\ActiveRecord;

use api\Core\General\Object\Domain\{
    Repository\IObjetoRepository,
    Objeto,
    Objetos
};

use common\models\Objects as Model;

class ObjetoRepositoryActiveRecord implements IObjetoRepository
{
    public function getbyId(int $objetoId): ?Objeto
    {
        $model = Model::findOne($objetoId);
        if (!$model) return null;
        return Objeto::fromPrimitives(...$model["attributes"]);
    }
}