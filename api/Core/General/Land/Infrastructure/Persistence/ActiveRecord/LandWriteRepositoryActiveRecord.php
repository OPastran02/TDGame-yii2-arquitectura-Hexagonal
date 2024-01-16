<?php

declare(strict_types=1);

namespace api\Core\General\Land\Infrastructure\Persistence\ActiveRecord;

use api\Core\General\Land\Domain\{
    Land,
    Repository\ILandWriteRepository
};
use api\Core\General\Object\Domain\Objeto; 
use common\models\Land as Model;

class LandWriteRepositoryActiveRecord implements ILandWriteRepository
{
    public function create($arr): Land
    {
        $model = new Model();
        $model->attributes = $arr;
        if ($model->save()) return $this->get($model["attributes"]["id"]);
    }
}
