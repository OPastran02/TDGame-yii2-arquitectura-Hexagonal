<?php

declare(strict_types=1);

namespace api\Core\General\Rarity\Infrastructure\Persistence\ActiveRecord;

use api\Core\General\Rarity\Domain\{
    Rarity,
    Repository\IRarityRepository
};
use api\Core\General\Object\Domain\Objeto;
use common\models\Rarity as Model;

class RarityRepositoryActiveRecord implements IRarityRepository
{
    public function get(int $rarityId): ?Rarity
    {
        $model = Model::find()
            ->with('object') 
            ->where(['id' => $rarityId])
            ->one();

        if (!$model) return null;

        $objeto = Objeto::fromPrimitives(...$model["object"]["attributes"]);

        return Rarity::fromPrimitives(
            $model['id'],
            $model['idObject'],
            $model['available'],
            $objeto
        );
    }
}
