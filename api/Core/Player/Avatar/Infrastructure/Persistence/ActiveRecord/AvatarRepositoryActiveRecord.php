<?php

declare(strict_types=1);

namespace api\Core\Player\Avatar\Infrastructure\Persistence\ActiveRecord;

use api\Core\Player\Avatar\Domain\Avatar;
use api\Core\Player\Avatar\Domain\Avatars;
use api\Core\Player\Avatar\Domain\Repository\IAvatarRepository;
use common\models\Avatar as Model;

class AvatarRepositoryActiveRecord implements IAvatarRepository
{
    public function getbyId(int $id): ?Avatar
    {
        $model = Model::findOne($id);

        if (!$model) {
            return null;
        }else{
            return Avatar::fromPrimitives(...$model["attributes"]);
        }
    }
}
