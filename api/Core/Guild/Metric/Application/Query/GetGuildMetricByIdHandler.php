<?php

declare(strict_types=1);

namespace api\Core\Guild\GuildMetric\Application\Query;

use api\Core\Guild\GuildMetric\Domain\GuildMetric;
use api\Core\Guild\GuildMetric\Domain\Repository\IGuildMetricRepository;

class GetGuildMetricByIdHandler
{
    private IGuildMetricRepository $repository;

    public function __construct(IGuildMetricRepository $repository)
    {
        $this->repository = $repository;
    }
 
    public function __invoke(int $id): ?GuildMetric
    {
        $obj = $this->repository->getbyId($id);
        return $obj;
    }
}