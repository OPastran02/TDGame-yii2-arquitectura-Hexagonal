<?php

declare(strict_types=1);

namespace api\Core\General\Land\Infrastructure\Persistence\ActiveRecord;

use api\Core\General\Land\Domain\{
    Land,
    Repository\ILandRepository
};
use api\Core\General\Object\Domain\Objeto; 
use common\models\Land as Model;

class LandRepositoryActiveRecord implements ILandRepository
{
    public function get(string $landId): ?Land
    {
        $model = Model::find()
            ->with('object') // Carga la relación "object"
            ->where(['id' => $landId])
            ->one();
        
        if (!$model) return null;

        $objeto = Objeto::fromPrimitives(...$model["object"]["attributes"]);

        return Land::fromPrimitives(
            $model['id'],
            $model['height'],
            $model['weight'],
            $model['gridMap'],
            $model['order'],
            $model['idObject'],
            $model['chat'],
            $model['available'],
            $objeto,
        );

    }

    public function create($arr): Land
    {

        $model = new Model();
        $model->attributes = $arr;
        if ($model->save()) {
            return $this->get($model["attributes"]["id"]);
        }else{
            var_dump($model->getErrors());
            exit();
        }
    }
}
