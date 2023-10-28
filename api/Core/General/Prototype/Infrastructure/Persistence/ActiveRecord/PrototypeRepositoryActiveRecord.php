<?php

declare(strict_types=1);

namespace api\Core\General\Prototype\Infrastructure\Persistence\ActiveRecord;

use api\Core\General\Prototype\Domain\{
    Prototype,
    Repository\IPrototypeRepository
};
use api\Core\General\Object\Domain\Objeto;
use common\models\Prototype as Model;

class PrototypeRepositoryActiveRecord implements IPrototypeRepository
{
    public function getByCriteria(int $rarity, int $type, int $race): ?Prototype
    {
        $model = Model::find()
            ->with('object') 
            ->where(['rarity' => $rarity])
            ->andWhere(['type' => $type])
            ->andWhere(['race' => $race])
            ->one();

        if (!$model) return null;

        $objeto = Objeto::fromPrimitives(...$model["object"]["attributes"]);

        return Prototype::fromPrimitives(
            $model['id'],
            $model['idObject'],
            $model['available'],
            $objeto
        );
    }
}
