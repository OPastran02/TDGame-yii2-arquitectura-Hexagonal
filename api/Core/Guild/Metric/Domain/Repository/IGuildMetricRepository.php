<?php   

namespace api\Core\Guild\GuildMetric\Domain\Repository;

use api\Core\Guild\GuildMetric\Domain\GuildMetric;
use api\Core\Guild\GuildMetric\Domain\GuildMetrics;

interface IGuildMetricRepository
{
    public function getbyId(int $id): ?GuildMetric;
}