<?php

declare(strict_types=1);

namespace api\Core\General\Land\Infrastructure\Persistence\ActiveRecord;

use api\Core\General\Land\Domain\Land;
use api\Core\General\Land\Domain\Repository\ILandRepository;
use common\models\Land as Model;

class LandRepositoryActiveRecord implements ILandRepository
{
    public function get(string $id): ?Land
    {
        $model = Model::findOne($id);

        if (!$model) {
            return null;
        }else{
            return Land::fromPrimitives(...$model["attributes"]);
        }
    }

    public function create($arr): Land
    {

        $model = new Model();
        $model->attributes = $arr;
        
        if ($model->save()) {
            $obj= Land::fromPrimitives(...$model->attributes);
            return $obj;
        }
    }
}
