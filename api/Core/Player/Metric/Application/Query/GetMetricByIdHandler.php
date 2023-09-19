<?php

declare(strict_types=1);

namespace api\Core\Player\Metric\Application\Query;

use api\Core\Player\Metric\Domain\Metric;
use api\Core\Player\Metric\Domain\Repository\IMetricRepository;

class GetMetricByIdHandler
{
    private IMetricRepository $repository;

    public function __construct(IMetricRepository $repository)
    {
        $this->repository = $repository;
    }
 
    public function __invoke(int $id): ?Metric
    {
        $obj = $this->repository->getbyId($id);
        return $obj;
    }
}