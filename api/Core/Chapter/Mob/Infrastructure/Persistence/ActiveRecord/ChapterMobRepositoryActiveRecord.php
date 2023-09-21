<?php

declare(strict_types=1);

namespace api\Core\Chapter\Mob\Infrastructure\Persistence\ActiveRecord;

use api\Core\Chapter\Mob\Domain\ChapterMob;
use api\Core\Chapter\Mob\Domain\ChapterMobs;
use api\Core\Chapter\Mob\Domain\Repository\IChapterMobRepository;
use common\models\ChapterMob as Model;

class ChapterMobRepositoryActiveRecord implements IChapterMobRepository
{
    public function getbyId(int $id): ?ChapterMob
    {
        $model = Model::findOne($id);

        if (!$model) {
            return null;
        }else{
            return ChapterMob::fromPrimitives(...$model["attributes"]);
        }
    }
}
