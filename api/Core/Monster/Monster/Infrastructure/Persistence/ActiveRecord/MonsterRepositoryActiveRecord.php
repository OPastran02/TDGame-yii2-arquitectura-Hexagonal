<?php

declare(strict_types=1);

namespace api\Core\Monster\Monster\Infrastructure\Persistence\ActiveRecord;

use api\Core\Monster\Monster\Domain\{
    Monster,
    Repository\IMonsterRepository
};
use api\Core\General\Object\Domain\Objeto; 
use api\Core\General\Stat\Domain\Stat; 
use common\models\Monster as Model;

class MonsterRepositoryActiveRecord implements IMonsterRepository
{
    public function get(int $monsterId): ?Monster
    {
        $model = Model::find()
            ->with('object') 
            ->with('stat') 
            ->where(['id' => $monsterId])
            ->one();

        if (!$model) return null;

        $objeto = Objeto::fromPrimitives(...$model["object"]["attributes"]);
        $stat = Stat::fromPrimitives(...$model["stat"]["attributes"]);

        return Monster::fromPrimitives(
            $model['id'],
            $model['idObject'],
            $model['stats'],
            $model['available'],
            $objeto,
            $stat
        );
    }
}
