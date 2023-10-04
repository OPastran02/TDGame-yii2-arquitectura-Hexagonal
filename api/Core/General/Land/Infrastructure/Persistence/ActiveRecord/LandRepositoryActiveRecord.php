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

        return Nature::fromPrimitives(
            $model['id'],
            $model['idObject'],
            $model['idBoost'],
            $model['available'],
            $objeto,
        );

    }

    public function create($arr): Land
    {

        $model = new Model();
        $model->attributes = $arr;
        var_dump($model);
        exit();
        if ($model->save()) {
            $obj= Land::fromPrimitives(...$model->attributes);
            return $obj;
        }else{
            var_dump($model->getErrors());
            exit();
        }
    }
}
