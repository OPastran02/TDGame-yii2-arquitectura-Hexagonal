<?php   

namespace api\Core\Player\Metric\Domain\Repository;

use api\Core\Player\Metric\Domain\Metric;
use api\Core\Player\Metric\Domain\Metrics;

interface IMetricRepository
{
    public function getbyId(int $id): ?Metric;
}