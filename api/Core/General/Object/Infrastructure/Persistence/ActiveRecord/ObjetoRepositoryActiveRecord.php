<?php

declare(strict_types=1);

namespace api\Core\General\Object\Infrastructure\Persistence\ActiveRecord;

use api\Core\General\Object\Domain\{
    Repository\IObjetoRepository,
    Objeto,
};

use common\models\Objects as Model;

class ObjetoRepositoryActiveRecord implements IObjetoRepository
{
    public function get(string $objetoId): ?Objeto
    {
        $model = Model::findOne($objetoId);
        if (!$model) return null;
        return Objeto::fromPrimitives(...$model["attributes"]);
    }

    public function create($objeto): ?Objeto
    {
        $model = new Model();
        $model->attributes = $objeto;
        if ($model->save()){
            return Objeto::fromPrimitives(...$model->attributes);
        }else{
            var_dump($model->getErrors());
            exit();
        } 
    }
}