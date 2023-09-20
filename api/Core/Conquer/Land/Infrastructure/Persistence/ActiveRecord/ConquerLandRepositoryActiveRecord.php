<?php

declare(strict_types=1);

namespace api\Core\Conquer\Land\Infrastructure\Persistence\ActiveRecord;

use api\Core\Conquer\Land\Domain\ConquerLand;
use api\Core\Conquer\Land\Domain\ConquerLands;
use api\Core\Conquer\Land\Domain\Repository\IConquerLandRepository;
use common\models\ConquerLand as Model;

class ConquerLandRepositoryActiveRecord implements IConquerLandRepository
{
    public function getbyId(int $id): ?ConquerLand
    {
        $model = Model::findOne($id);

        if (!$model) {
            return null;
        }else{
            return ConquerLand::fromPrimitives(...$model["attributes"]);
        }
    }
}
