<?php

declare(strict_types=1);

namespace api\Core\Player\RankedMetric\Infrastructure\Persistence\ActiveRecord;

use api\Core\Player\RankedMetric\Domain\RankedMetric;
use api\Core\Player\RankedMetric\Domain\RankedMetrics;
use api\Core\Player\RankedMetric\Domain\Repository\IRankedMetricRepository;
use common\models\RankedMetric as Model;

class RankedMetricRepositoryActiveRecord implements IRankedMetricRepository
{
    public function getbyId(int $id): ?RankedMetric
    {
        $model = Model::findOne($id);

        if (!$model) {
            return null;
        }else{
            return RankedMetric::fromPrimitives(...$model["attributes"]);
        }
    }
}
