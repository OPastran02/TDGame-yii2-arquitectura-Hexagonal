<?php

declare(strict_types=1);

namespace api\Core\Chapter\Land\Infrastructure\Persistence\ActiveRecord;

use api\Core\Chapter\Land\Domain\{
    ChapterLand,
    Repository\IChapterLandRepository
};
use common\models\ChapterLand as Model;
use api\Core\General\Object\Domain\Objeto;
use api\Core\General\Land\Domain\Land;
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

        $objeto = Objeto::fromPrimitives(
            $model->land->object->id,
            $model->land->object->name,
            $model->land->object->description,
            $model->land->object->color,
            $model->land->object->model,
            $model->land->object->image,
            $model->land->object->available,
        );

        $land = Land::fromPrimitives(
            $model->land->id,
            $model->land->height,
            $model->land->weight,
            $model->land->gridMap,
            $model->land->order,
            $model->land->idObject,
            $model->land->chat,
            $model->land->available,
            $objeto
        );

        return ChapterLand::fromPrimitives(
            $model->id,
            $model->idchapter,
            $model->idland,
            $model->available,
            $land
        );
    }
}
