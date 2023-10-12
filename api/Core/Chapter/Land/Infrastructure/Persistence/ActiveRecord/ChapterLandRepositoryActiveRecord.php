<?php

declare(strict_types=1);

namespace api\Core\General\ChapterLand\Infrastructure\Persistence\ActiveRecord;

use api\Core\General\ChapterLand\Domain\ChapterLand;
use api\Core\General\ChapterLand\Domain\ChapterLands;
use api\Core\General\ChapterLand\Domain\Repository\IChapterLandRepository;
use common\models\ChapterLand as Model;
use api\Core\General\Object\Domain\Objeto;
use api\Core\General\Object\Infrastructure\Persistence\ActiveRecord\ObjetoRepositoryActiveRecord;

class ChapterLandRepositoryActiveRecord implements IChapterLandRepository
{
    public function get(int $chapterLandId): ?ChapterLand
    {
        $objeto = new ObjetoRepositoryActiveRecord();

        $model = Model::find()
            ->with('land.object')
            ->where(['id' => $chapterLandId])
            ->one();

        if (!$model) return null;

        $objeto = Objeto::fromPrimitives(...$model["land"]["object"]);



    }
}
