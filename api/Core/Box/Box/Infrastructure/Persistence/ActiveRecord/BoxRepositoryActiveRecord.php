<?php

declare(strict_types=1);

namespace api\Core\Box\Box\Infrastructure\Persistence\ActiveRecord;

use api\Core\Box\Box\Domain\Box;
use api\Core\Box\Box\Domain\Boxs;
use api\Core\Box\Box\Domain\Repository\IBoxRepository;
use common\models\Box as Model;

class BoxRepositoryActiveRecord implements IBoxRepository
{
    public function getbyId(int $id): ?Box
    {
        $model = Model::findOne($id);
        if (!$model) return null;
        return Box::fromPrimitives(...$model["attributes"]);
    }
}
