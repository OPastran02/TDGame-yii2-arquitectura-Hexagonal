<?php

declare(strict_types=1);

namespace api\Core\General\Rarity\Infrastructure\Persistence\ActiveRecord;

use api\Core\General\Rarity\Domain\Rarity;
use api\Core\General\Object\Domain\Objeto;
use api\Core\General\Rarity\Domain\Repository\IRarityRepository;
use common\models\Rarity as Model;

class RarityRepositoryActiveRecord implements IRarityRepository
{
    public function getbyId(int $id): ?Rarity
    {
        $model = Model::find()
            ->with('object') 
            ->where(['id' => $id])
            ->one();

        if (!$model) {
            return null;
        }

        $objeto = Objeto::fromPrimitives(...$model["object"]["attributes"]);

        return Rarity::fromPrimitives(
            $model['id'],
            $model['idObject'],
            $model['available'],
            $objeto
        );
    }
}
