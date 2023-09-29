<?php

declare(strict_types=1);

namespace api\Core\General\Stat\Infrastructure\Persistence\ActiveRecord;

use api\Core\General\Stat\Domain\{
    Stat,
    Repository\IStatRepository
};

use common\models\Stat as Model;

class StatRepositoryActiveRecord implements IStatRepository
{
    public function get(string $statId): ?Stat
    {
        $model = Model::findOne($statId);
        if (!$model) return null;
        return Stat::fromPrimitives(...$model["attributes"]);
    }

    public function save($arr): Stat
    {
        $model = new Model();
        $model->attributes = $arr;
        if ($model->save()) {
            $obj= Stat::fromPrimitives(...$model->attributes);
            return $obj;
        }
    }
}
