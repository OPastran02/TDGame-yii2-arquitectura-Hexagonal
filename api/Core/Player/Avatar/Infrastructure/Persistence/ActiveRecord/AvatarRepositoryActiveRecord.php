<?php

declare(strict_types=1);

namespace api\Core\Player\Avatar\Infrastructure\Persistence\ActiveRecord;

use api\Core\Player\Avatar\Domain\Avatar;
use api\Core\General\Object\Domain\Objeto;
use api\Core\Player\Avatar\Domain\Repository\IAvatarRepository;
use common\models\Avatar as Model;

class AvatarRepositoryActiveRecord implements IAvatarRepository
{
    public function getbyId(string $id): ?Avatar
    {
        $model = Model::find()
            ->with('object') 
            ->where(['id' => $id])
            ->one();

        if (!$model) {
            return null;
        }

        $objeto = Objeto::fromPrimitives(...$model["object"]["attributes"]);

        return Avatar::fromPrimitives(
            $model['id'],
            $model['idObject'],
            $model['available'],
            $objeto
        );
    }
}
