<?php   

namespace api\Core\Guild\Metric\Domain\Repository;

use api\Core\Guild\Metric\Domain\GuildMetric;

interface IGuildMetricRepository
{
    public function get(string $id): ?GuildMetric;
    public function create($guildMetric): ?GuildMetric;
    public function update($guildMetric): ?GuildMetric;
}