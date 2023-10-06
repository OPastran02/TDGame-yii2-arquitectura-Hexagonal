<?php

declare(strict_types=1);

namespace api\Core\Guild\Title\Infrastructure\Persistence\ActiveRecord;

use api\Core\Guild\title\Domain\{
    GuildTitle,
    Repository\IGuildTitleRepository
};
use api\Core\General\Object\Domain\Objeto;
use common\models\GuildTitle as Model;

class GuildTitleRepositoryActiveRecord implements IGuildTitleRepository
{
    public function get(int $guildTitleId): ?GuildTitle
    {
        $model = Model::find()
            ->with('object') 
            ->where(['id' => $guildTitleId])
            ->one();

        if (!$model) return null;
   
        $objeto = Objeto::fromPrimitives(...$model["object"]["attributes"]);

        return GuildTitle::fromPrimitives(
            $model['id'],
            $model['idObject'],
            $model['available'],
            $objeto
        );
    }
}
