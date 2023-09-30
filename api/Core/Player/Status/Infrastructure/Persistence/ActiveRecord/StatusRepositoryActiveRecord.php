<?php

declare(strict_types=1);

namespace api\Core\Player\Status\Infrastructure\Persistence\ActiveRecord;

use api\Core\Player\Status\Domain\{
    Status,
    Statuses,
    Repository\IStatusRepository
};
use common\models\Status as Model;

class StatusRepositoryActiveRecord implements IStatusRepository
{
    public function get(string $statusId): ?Status
    {
        $model = Model::findOne($statusId);
        if (!$model) return null;
        return Status::fromPrimitives(...$model["attributes"]);
    }

    public function create($arr): Status
    {
        $model = new Model();
        $model->attributes = $arr;
        if ($model->save()) return Status::fromPrimitives(...$model->attributes);
    }

    public function updateBattlePass($arr): Status
    {
        $model = Model::findOne($arr['id']);
        $model->attributes = $arr;
        if($model->save()) return Status::fromPrimitives(...$model->attributes);
    }
}