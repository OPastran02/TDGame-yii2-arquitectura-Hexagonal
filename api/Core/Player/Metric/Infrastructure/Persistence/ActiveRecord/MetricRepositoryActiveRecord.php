<?php

declare(strict_types=1);

namespace api\Core\Player\Metric\Infrastructure\Persistence\ActiveRecord;

use api\Core\Player\Metric\Domain\{
    Metric,
    Repository\IMetricRepository
};
use common\models\Metric as Model;

class MetricRepositoryActiveRecord implements IMetricRepository
{
    public function get(string $metricId): ?Metric
    {
        $model = Model::findOne($metricId);
        if ($model) return Metric::fromPrimitives(...$model["attributes"]);
    }

    public function create($arr): ?Metric
    {
        $model = new Model();
        $model->attributes = $arr;
        if ($model->save()) return Metric::fromPrimitives(...$model->attributes);
    }

    public function update($arr): Metric
    {
        $model = Model::findOne($arr['id']);
        $model->attributes = $arr;
        if($model->save()) return Metric::fromPrimitives(...$model->attributes);
    }
}
