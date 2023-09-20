<?php

declare(strict_types=1);

namespace api\Core\General\GuildTitle\Infrastructure\Persistence\ActiveRecord;

use api\Core\General\GuildTitle\Domain\GuildTitle;
use api\Core\General\GuildTitle\Domain\GuildTitles;
use api\Core\General\GuildTitle\Domain\Repository\IGuildTitleRepository;
use common\models\GuildTitle as Model;

class GuildTitleRepositoryActiveRecord implements IGuildTitleRepository
{
    public function getbyId(int $id): ?GuildTitle
    {
        $model = Model::findOne($id);

        if (!$model) {
            return null;
        }else{
            return GuildTitle::fromPrimitives(...$model["attributes"]);
        }
    }
}
