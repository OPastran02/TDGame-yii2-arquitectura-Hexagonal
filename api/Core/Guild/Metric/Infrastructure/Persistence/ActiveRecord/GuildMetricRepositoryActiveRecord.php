<?php

declare(strict_types=1);

namespace api\Core\Guild\Metric\Infrastructure\Persistence\ActiveRecord;

use api\Core\Guild\Metric\Domain\{
    GuildMetric,
    Repository\IGuildMetricRepository
};
use common\models\GuildMetric as Model;

class GuildMetricRepositoryActiveRecord implements IGuildMetricRepository
{
    public function get(string $metricId): ?GuildMetric
    {
        $model = Model::findOne($metricId);
        if ($model) return GuildMetric::fromPrimitives(...$model["attributes"]);
    }

    public function create($arr): ?GuildMetric
    {
        $model = new Model();
        $model->attributes = $arr;
        if ($model->save()) return GuildMetric::fromPrimitives(...$model->attributes);
    }

    public function update($arr): ?GuildMetric
    {
        $model = Model::findOne($arr['id']);
        $model->attributes = $arr;
        if ($model->save()) return GuildMetric::fromPrimitives(...$model->attributes);
    }
}
