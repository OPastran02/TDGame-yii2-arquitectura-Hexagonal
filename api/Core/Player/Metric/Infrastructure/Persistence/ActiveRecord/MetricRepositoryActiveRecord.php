<?php

declare(strict_types=1);

namespace api\Core\Player\Metric\Infrastructure\Persistence\ActiveRecord;

use api\Core\Player\Metric\Domain\Metric;
use api\Core\Player\Metric\Domain\Metrics;
use api\Core\Player\Metric\Domain\Repository\IMetricRepository;
use common\models\Metric as Model;

class MetricRepositoryActiveRecord implements IMetricRepository
{
    public function getbyId(int $id): ?Metric
    {
        $model = Model::findOne($id);

        if (!$model) {
            return null;
        }else{
            return Metric::fromPrimitives(...$model["attributes"]);
        }
    }
}
