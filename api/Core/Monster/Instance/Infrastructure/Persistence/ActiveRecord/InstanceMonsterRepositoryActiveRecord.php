<?php

declare(strict_types=1);

namespace api\Core\Monster\Instance\Infrastructure\Persistence\ActiveRecord;

use api\Core\Monster\Instance\Domain\InstanceMonster;
use api\Core\Monster\Instance\Domain\InstanceMonsters;
use api\Core\Monster\Instance\Domain\Repository\IInstanceMonsterRepository;
use common\models\InstanceMonster as Model;

class InstanceMonsterRepositoryActiveRecord implements IInstanceMonsterRepository
{
    public function getbyId(int $id): ?InstanceMonster
    {
        $model = Model::findOne($id);

        if (!$model) {
            return null;
        }else{
            return InstanceMonster::fromPrimitives(...$model["attributes"]);
        }
    }
}
