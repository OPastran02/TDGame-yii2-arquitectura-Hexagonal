<?php

declare(strict_types=1);

namespace api\Core\General\GuildLand\Infrastructure\Persistence\ActiveRecord;

use api\Core\General\GuildLand\Domain\GuildLand;
use api\Core\General\GuildLand\Domain\GuildLands;
use api\Core\General\GuildLand\Domain\Repository\IGuildLandRepository;
use common\models\GuildLand as Model;

class GuildLandRepositoryActiveRecord implements IGuildLandRepository
{
    public function getbyId(int $id): ?GuildLand
    {
        $model = Model::findOne($id);

        if (!$model) {
            return null;
        }else{
            return GuildLand::fromPrimitives(...$model["attributes"]);
        }
    }
}
