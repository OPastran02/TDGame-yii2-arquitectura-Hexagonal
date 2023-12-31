<?php

declare(strict_types=1);

namespace api\Core\Chapter\Instance\Infrastructure\Persistence\ActiveRecord;

use api\Core\Chapter\Instance\Domain\{
    InstanceChapter,
    InstanceChapters,
    Repository\IInstanceChapterRepository
};
use common\models\InstanceChapter as Model;

class InstanceChapterRepositoryActiveRecord implements IInstanceChapterRepository
{
    public function getbyIdPlayer(string $playerId): array
    {
        $models = Model::find()
            ->where(['idPlayer' => $playerId])
            ->all();

        if (!$models) return null;

        $instances = [];
    
        foreach ($models as $model) {
            $instances[] = InstanceChapter::fromPrimitives(...$model->attributes);
        }

        return $instances;
    }

    public function create($arr): array
    {
        $model = new Model();
        $model->attributes = $arr;
        if ($model->save()) return $this->getbyIdPlayer($model["attributes"]["idPlayer"]);
    }

    public function getbyChapter(string $playerId, int $chapterId): InstanceChapter
    {
        $model = Model::find()
            ->where(['idPlayer' => $playerId, 'idChapter' => $chapterId])
            ->one();

        if (!$model) return null;
        return $model = InstanceChapter::fromPrimitives(...$model->attributes);
    }

    public function updateChapter($arr): InstanceChapter
    {
        $model = Model::findOne($arr['id']);
        $model->attributes = $arr;
        if ($model->save()) return $this->getbyChapter($model["attributes"]["idPlayer"],$model["attributes"]["idChapter"]);
    }
}
