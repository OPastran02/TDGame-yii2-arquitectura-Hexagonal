<?php

declare(strict_types=1);

namespace api\Core\General\Stat\Infrastructure\Persistence\ActiveRecord;

use api\Core\General\Stat\Domain\Stat;
use api\Core\General\Stat\Domain\Repository\IStatRepository;
use common\models\Stat as Model;

class StatRepositoryActiveRecord implements IStatRepository
{
    public function getbyId(string $id): ?Stat
    {
        $model = Model::findOne($id);

        if (!$model) {
            return null;
        }else{
            return Stat::fromPrimitives(...$model["attributes"]);
        }
    }

    public function save($arr): ?string
    {

        $model = new Model();
        $model->attributes = $arr;
        
        if ($model->save()) {
            return $model->getPrimaryKey(); 
        }
    }
}
