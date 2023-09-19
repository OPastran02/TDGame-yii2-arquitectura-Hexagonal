<?php

declare(strict_types=1);

namespace api\Core\Hero\Type\Infrastructure\Persistence\ActiveRecord;

use api\Core\Hero\Type\Domain\Type;
use api\Core\Hero\Type\Domain\Types;
use api\Core\Hero\Type\Domain\Repository\ITypeRepository;
use common\models\Type as Model;

class TypeRepositoryActiveRecord implements ITypeRepository
{
    public function getbyId(int $id): ?Type
    {
        $model = Model::findOne($id);

        if (!$model) {
            return null;
        }else{
            return Type::fromPrimitives(...$model["attributes"]);
        }
    }
}
