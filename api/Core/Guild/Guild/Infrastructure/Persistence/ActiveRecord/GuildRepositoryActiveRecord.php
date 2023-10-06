<?php

declare(strict_types=1);

namespace api\Core\Guild\Guild\Infrastructure\Persistence\ActiveRecord;

use api\Core\Guild\Guild\Domain\{
    Guild,
    Repository\IGuildRepository
};
use api\Core\General\Object\Domain\Objeto;
use api\Core\Guild\Stash\Domain\Stash;
use api\Core\Guild\Metric\Domain\GuildMetric;
use common\models\Guild as Model;

class GuildRepositoryActiveRecord implements IGuildRepository
{
    public function get(string $guildId): ?Guild
    { 
        $model = Model::find()
            ->with('object')
            ->with('stash')
            ->with('metrics')
            ->where(['id' => $guildId])
            ->one();

        if (!$model) return null;

        $objeto = Objeto::fromPrimitives(...$model->object->getAttributes());
        $stash = Stash::fromPrimitives(...$model->stash->getAttributes());
        $metric = GuildMetric::fromPrimitives(...$model->metrics->getAttributes());
            
        return Guild::fromPrimitives(
            $model['id'],
            $model['idObject'],
            $model['idstash'],
            $model['idmetrics'],
            $model['maxMembers'],
            $model['experience'],
            $model['level'],
            $model['available'],
            $objeto,
            $stash,
            $metric
        );
    }

    public function create($arr): Guild
    {
        $model = new Model();
        $model->attributes = $arr;
        if ($model->save()) return $this->get($model["attributes"]["id"]);
    }

    public function addExperience($arr): Guild
    {
        $model = Model::findOne($arr['id']);
        $model->attributes = $arr;
        if ($model->save()) return $this->get($model["attributes"]["id"]);
    }
}
