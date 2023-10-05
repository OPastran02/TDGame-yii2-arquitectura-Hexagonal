<?php

declare(strict_types=1);

namespace api\Core\Guild\Stash\Infrastructure\Persistence\ActiveRecord;

use api\Core\Guild\Stash\Domain\{
    Stash,
    Repository\IStashRepository
};
use common\models\Stash as Model;

class StashRepositoryActiveRecord implements IStashRepository
{
    public function get(string $stashId): ?Stash
    {
        $model = Model::findOne($stashId);
        if ($model) return Stash::fromPrimitives(...$model["attributes"]);  
    }

    public function create($arr): Stash
    {
        $model = new Model();
        $model->attributes = $arr;
        if ($model->save()) return Stash::fromPrimitives(...$model->attributes);
    }

    public function addResources($arr): Stash
    {
        $model = Model::findOne($arr['id']);
        $model->attributes = $arr;
        if($model->save()) return Stash::fromPrimitives(...$model->attributes);
    }
}
