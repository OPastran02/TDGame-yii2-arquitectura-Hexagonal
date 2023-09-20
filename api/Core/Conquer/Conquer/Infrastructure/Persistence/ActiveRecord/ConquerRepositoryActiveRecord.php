<?php

declare(strict_types=1);

namespace api\Core\Conquer\Conquer\Infrastructure\Persistence\ActiveRecord;

use api\Core\Conquer\Conquer\Domain\Conquer;
use api\Core\Conquer\Conquer\Domain\Conquers;
use api\Core\Conquer\Conquer\Domain\Repository\IConquerRepository;
use common\models\Conquer as Model;

class ConquerRepositoryActiveRecord implements IConquerRepository
{
    public function getbyId(int $id): ?Conquer
    {
        $model = Model::findOne($id);

        if (!$model) {
            return null;
        }else{
            return Conquer::fromPrimitives(...$model["attributes"]);
        }
    }
}
