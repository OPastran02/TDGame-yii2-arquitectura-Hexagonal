<?php

declare(strict_types=1);

namespace api\Core\General\Rarity\Infrastructure\Persistence\ActiveRecord;

use api\Core\General\Rarity\Domain\Rarity;
use api\Core\General\Rarity\Domain\Rarities;
use api\Core\General\Rarity\Domain\Repository\IRarityRepository;
use common\models\Rarity as Model;

class RarityRepositoryActiveRecord implements IRarityRepository
{
    public function getbyId(int $id): ?Rarity
    {
        $model = Model::findOne($id);

        if (!$model) {
            return null;
        }else{
            return Rarity::fromPrimitives(...$model["attributes"]);
        }
    }
}
