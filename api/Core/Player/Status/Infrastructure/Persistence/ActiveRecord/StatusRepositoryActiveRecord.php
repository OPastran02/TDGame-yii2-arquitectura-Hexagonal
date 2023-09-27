<?php

declare(strict_types=1);

namespace api\Core\Player\Status\Infrastructure\Persistence\ActiveRecord;

use api\Core\Player\Status\Domain\Status;
use api\Core\Player\Status\Domain\Statuses;
use api\Core\Player\Status\Domain\Repository\IStatusRepository;
use common\models\Status as Model;

class StatusRepositoryActiveRecord implements IStatusRepository
{
    public function getbyId(string $id): ?Status
    {
        $model = Model::findOne($id);

        if (!$model) {
            return null;
        }else{
            return Status::fromPrimitives(...$model["attributes"]);
        }
    }

    public function save($arr): Status
    {
        $model = new Model();
        $model->attributes = $arr;
        
        if ($model->save()) {
            return Status::fromPrimitives(...$model->attributes);
        }
    }
}
