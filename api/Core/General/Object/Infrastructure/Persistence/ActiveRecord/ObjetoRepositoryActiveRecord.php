<?php

declare(strict_types=1);

namespace api\Core\General\Object\Infrastructure\Persistence\ActiveRecord;

use api\Core\General\Object\Domain\Objeto;
use api\Core\General\Object\Domain\Objetos;
use api\Core\General\Object\Domain\Repository\IObjetoRepository;
use common\models\Objeto as Model;

class ObjetoRepositoryActiveRecord implements IObjetoRepository
{
    public function getbyId(int $id): ?Objeto
    {
        $model = Model::findOne($id);

        if (!$model) {
            return null;
        }else{
            return Objeto::fromPrimitives(...$model["attributes"]);
        }
    }
}
