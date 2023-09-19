<?php

declare(strict_types=1);

namespace api\Core\Player\RankedMetric\Application\Query;

use api\Core\Player\RankedMetric\Domain\RankedMetric;
use api\Core\Player\RankedMetric\Domain\Repository\IRankedMetricRepository;

class GetRankedMetricByIdHandler
{
    private IRankedMetricRepository $repository;

    public function __construct(IRankedMetricRepository $repository)
    {
        $this->repository = $repository;
    }
 
    public function __invoke(int $id): ?Metric
    {
        $obj = $this->repository->getbyId($id);
        return $obj;
    }
}