<?php

declare(strict_types=1);

namespace api\Core\Rank\Rank\Infrastructure\Persistence\ActiveRecord;

use api\Core\Rank\Rank\Domain\{
    Rank,
    Repository\IRankRepository
};
use api\Core\General\Object\Domain\Objeto; 
use common\models\Rank as Model;

class RankRepositoryActiveRecord implements IRankRepository
{
    public function getbyId(int $rankId): ?Rank
    {

        $model = Model::find()
            ->with('object')
            ->where(['id' => $rankId])
            ->one();

        if (!$model) return null;

        $objeto = Objeto::fromPrimitives(...$model["object"]["attributes"]);

        return Rank::fromPrimitives(
            $model['id'],
            $model['idObject'],
            $model['available'],
            $objeto,
        );
    }
}
