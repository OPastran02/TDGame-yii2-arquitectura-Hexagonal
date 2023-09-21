<?php

declare(strict_types=1);

namespace api\Core\General\ChapterLand\Infrastructure\Persistence\ActiveRecord;

use api\Core\General\ChapterLand\Domain\ChapterLand;
use api\Core\General\ChapterLand\Domain\ChapterLands;
use api\Core\General\ChapterLand\Domain\Repository\IChapterLandRepository;
use common\models\ChapterLand as Model;

class ChapterLandRepositoryActiveRecord implements IChapterLandRepository
{
    public function getbyId(int $id): ?ChapterLand
    {
        $model = Model::findOne($id);

        if (!$model) {
            return null;
        }else{
            return ChapterLand::fromPrimitives(...$model["attributes"]);
        }
    }
}
