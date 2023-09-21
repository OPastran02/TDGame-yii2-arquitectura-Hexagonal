<?php

declare(strict_types=1);

namespace api\Core\Monster\Monster\Infrastructure\Persistence\ActiveRecord;

use api\Core\Monster\Monster\Domain\Monster;
use api\Core\Monster\Monster\Domain\Monsters;
use api\Core\Monster\Monster\Domain\Repository\IMonsterRepository;
use common\models\Monster as Model;

class MonsterRepositoryActiveRecord implements IMonsterRepository
{
    public function getbyId(int $id): ?Monster
    {
        $model = Model::findOne($id);

        if (!$model) {
            return null;
        }else{
            return Monster::fromPrimitives(...$model["attributes"]);
        }
    }
}
