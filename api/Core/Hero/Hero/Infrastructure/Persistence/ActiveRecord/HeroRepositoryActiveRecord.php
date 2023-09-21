<?php

declare(strict_types=1);

namespace api\Core\Hero\Hero\Infrastructure\Persistence\ActiveRecord;

use api\Core\Hero\Hero\Domain\Hero;
use api\Core\Hero\Hero\Domain\Repository\IHeroRepository;
use common\models\Hero as Model;

class HeroRepositoryActiveRecord implements IHeroRepository
{
    public function getbyId(int $id): ?Hero
    {
        $model = Model::findOne($id);

        if (!$model) {
            return null;
        }else{
            return Hero::fromPrimitives(...$model["attributes"]);
        }
    }
}
