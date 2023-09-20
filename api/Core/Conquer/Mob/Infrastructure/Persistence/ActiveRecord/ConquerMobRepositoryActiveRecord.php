<?php

declare(strict_types=1);

namespace api\Core\Conquer\Mob\Infrastructure\Persistence\ActiveRecord;

use api\Core\Conquer\Mob\Domain\ConquerMob;
use api\Core\Conquer\Mob\Domain\ConquerMobs;
use api\Core\Conquer\Mob\Domain\Repository\IConquerMobRepository;
use common\models\ConquerMob as Model;

class ConquerMobRepositoryActiveRecord implements IConquerMobRepository
{
    public function getbyId(int $id): ?ConquerMob
    {
        $model = Model::findOne($id);

        if (!$model) {
            return null;
        }else{
            return ConquerMob::fromPrimitives(...$model["attributes"]);
        }
    }
}
