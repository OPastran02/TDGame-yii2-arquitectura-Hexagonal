<?php

declare(strict_types=1);

namespace api\Core\Player\Player\Infrastructure\Persistence\ActiveRecord;

use api\Core\Player\Player\Domain\Player;
use api\Core\Player\Player\Domain\Players;
use api\Core\Player\Player\Domain\Repository\IPlayerRepository;
use common\models\Player as Model;

class PlayerRepositoryActiveRecord implements IPlayerRepository
{
    public function getbyId(int $id): ?Player
    {
        $model = Model::findOne($id);

        if (!$model) {
            return null;
        }else{
            return Player::fromPrimitives(...$model["attributes"]);
        }
    }
}
