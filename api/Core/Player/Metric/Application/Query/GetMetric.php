<?php

declare(strict_types=1);

namespace api\Core\Player\Metric\Application\Query;

use api\Core\Player\Metric\Domain\{
    Metric,
    Repository\IMetricRepository
};

class GetMetric
{
    private IMetricRepository $repository;

    public function __construct(IMetricRepository $repository)
    {
        $this->repository = $repository;
    }
 
    public function __invoke(string $id): ?Metric
    {
        return $this->repository->get($id);
    }
}