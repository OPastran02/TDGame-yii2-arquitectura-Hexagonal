<?php

declare(strict_types=1);

namespace api\Core\Guild\GuildMetric\Infrastructure\Persistence\ActiveRecord;

use api\Core\Guild\GuildMetric\Domain\GuildMetric;
use api\Core\Guild\GuildMetric\Domain\GuildMetrics;
use api\Core\Guild\GuildMetric\Domain\Repository\IGuildMetricRepository;
use common\models\GuildMetric as Model;

class GuildMetricRepositoryActiveRecord implements IGuildMetricRepository
{
    public function getbyId(int $id): ?GuildMetric
    {
        $model = Model::findOne($id);

        if (!$model) {
            return null;
        }else{
            return GuildMetric::fromPrimitives(...$model["attributes"]);
        }
    }
}
