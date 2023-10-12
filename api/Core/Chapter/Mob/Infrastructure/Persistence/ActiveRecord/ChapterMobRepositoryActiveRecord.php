<?php

declare(strict_types=1);

namespace api\Core\Chapter\Mob\Infrastructure\Persistence\ActiveRecord;

use api\Core\Chapter\Mob\Domain\{
    ChapterMob,
    Repository\IChapterMobRepository
};
use common\models\ChapterMob as Model;
use api\Core\General\Object\Domain\Objeto; 
use api\Core\General\Stat\Domain\Stat; 

class ChapterMobRepositoryActiveRecord implements IChapterMobRepository
{
    public function getbyIdLand(string $landId): ?array
    {
        $models = Model::find()
            ->with('object')
            ->with('stats')
            ->where(['idChapterLand' => $landId])
            ->all();

        $instances = [];
        foreach ($models as $model) {
            $objeto = Objeto::fromPrimitives(...$model["object"]["attributes"]);
            $stat = Stat::fromPrimitives(...$model["stats"]["attributes"]);
            $instances[] = ChapterMob::fromPrimitives(
                $model->id,
                $model->idObject,
                $model->idChapterLand,
                $model->idStats,
                $model->available,
                $objeto,
                $stat
            );
        }
        return $instances;

    }
}
