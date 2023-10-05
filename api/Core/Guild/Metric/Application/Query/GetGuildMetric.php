<?php

declare(strict_types=1);

namespace api\Core\Guild\Metric\Application\Query;

use api\Core\Guild\Metric\Domain\{
    GuildMetric,
    Repository\IGuildMetricRepository
};

class GetGuildMetric
{
    private IGuildMetricRepository $repository;

    public function __construct(IGuildMetricRepository $repository)
    {
        $this->repository = $repository;
    }
 
    public function __invoke(string $guildMetricId): ?GuildMetric
    {
        return $this->repository->get($guildMetricId);
    }
}