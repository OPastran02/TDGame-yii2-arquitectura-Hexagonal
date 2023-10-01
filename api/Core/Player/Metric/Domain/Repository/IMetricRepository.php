<?php   

namespace api\Core\Player\Metric\Domain\Repository;

use api\Core\Player\Metric\Domain\Metric;

interface IMetricRepository
{
    public function get(string $id): ?Metric;
    public function create($metric): ?Metric;
    public function update($metric): ?Metric;
}