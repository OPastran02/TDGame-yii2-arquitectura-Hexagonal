<?php

declare(strict_types=1);

namespace api\Core\Guild\Guild\Infrastructure\Persistence\ActiveRecord;

use api\Core\Guild\Guild\Domain\Guild;
use api\Core\Guild\Guild\Domain\Guilds;
use api\Core\Guild\Guild\Domain\Repository\IGuildRepository;
use common\models\Guild as Model;

class GuildRepositoryActiveRecord implements IGuildRepository
{
    public function getbyId(int $id): ?Guild
    {
        $model = Model::findOne($id);

        if (!$model) {
            return null;
        }else{
            return Guild::fromPrimitives(...$model["attributes"]);
        }
    }
}
